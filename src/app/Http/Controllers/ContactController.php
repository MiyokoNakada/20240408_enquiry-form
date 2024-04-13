<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use Symfony\Component\HttpFoundation\StreamedResponse;


class ContactController extends Controller
{
    //お問い合わせフォームの入力画面を表示
    public function index()
    {
        $categories = Category::all();
        return view('index', ['categories' => $categories]);
    }

    //フォーム入力画面で確認画面ボタンをクリック
    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tell1', 'tell2', 'tell3', 'address', 'building', 'category_id', 'detail']);
        $category = Category::find($request->input('category_id'))->content;

        return view('confirm', compact('category', 'contact'));
    }

    //確認画面で送信ボタンをクリック
    public function store(Request $request)
    {
        //修正ボタンをクリックしたとき
        if ($request->input('back') == 'back') {
            return redirect('/')->withInput();
        }
        $phoneNumber = $request->input('tell1') . $request->input('tell2') . $request->input('tell3');
        $contact = $request->only(['first_name', 'last_name', 'category_id', 'gender', 'email', 'address', 'building', 'detail']);
        $contact['tell'] = $phoneNumber;

        Contact::create($contact);
        return view('thanks');
    }

    //管理者画面の表示
    public function admin()
    {
        $categories = Category::all();
        $contacts = Contact::Paginate(7);
        return view('admin', compact('categories', 'contacts'));
    }

    //検索機能
    public function search(Request $request)
    {
        $query = Contact::query()
            ->KeywordSearch($request->keyword)
            ->CategorySearch($request->category_id)
            ->DateSearch($request->date);

        if ($request->gender != 4) {
            $query = $query->GenderSearch($request->gender);
        }

        $contacts = $query->paginate(7)->withQueryString();
        $categories = Category::all();

        // 検索条件をセッションに保存(for export function)
        session()->put('export_keyword', $request->input('keyword'));
        session()->put('export_gender', $request->input('gender'));
        session()->put('export_category_id', $request->input('category_id'));
        session()->put('export_date', $request->input('date'));

        return view('admin', compact('categories', 'contacts'));
    }

    //検索リセット
    public function reset(Request $request)
    {
        // セッションから検索条件をクリアする
        $request->session()->forget('export_keyword');
        $request->session()->forget('export_gender');
        $request->session()->forget('export_category_id');
        $request->session()->forget('export_date');

        return redirect('/admin');
    }

    // エクスポート機能
    public function export()
    {
        // セッションから検索条件を取得する
        $keyword = session()->get('export_keyword');
        $gender = session()->get('export_gender');
        $category_id = session()->get('export_category_id');
        $date = session()->get('export_date');

        $query = Contact::query()
            ->KeywordSearch($keyword)
            ->CategorySearch($category_id)
            ->DateSearch($date);
        if ($gender != 4) {
            $query = $query->GenderSearch($gender);
        }

        $contacts = $query->get();

        $csvHeader = ['id', 'category_id', 'first_name', 'last_name',  'gender', 'email', 'tell', 'address', 'building', 'detail', 'created_at', 'updated_at'];
        $csvData = $contacts->toArray();

        $response = new StreamedResponse(function () use ($csvHeader, $csvData) {
            $handle = fopen('php://output', 'w');

            if ($handle !== false) { // UTF-8 エンコーディングで書き込み可能なモードで開く
                fwrite($handle, "\xEF\xBB\xBF"); // BOM（Byte Order Mark）を書き込み
                fputcsv($handle, $csvHeader); // ヘッダーを書き込み
                foreach ($csvData as $row) { // データを書き込み
                    $encodedRow = array_map(function ($item) {  // データの各要素をUTF-8に変換する
                        return mb_convert_encoding($item, 'UTF-8', 'auto');
                    }, $row);
                    fputcsv($handle, $encodedRow);
                }
                fclose($handle);
            }
        }, 200, [
            'Content-Type' => 'text/csv; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="contacts.csv"',
        ]);

        return $response;
    }
}
