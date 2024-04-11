<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

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
        $phoneNumber = $request->input('tell1').$request->input('tell2').$request->input('tell3');
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'address', 'building', 'category_id', 'detail']);
        $contact['tell'] = $phoneNumber;
        $category = Category::find($request->input('category_id'))->content;
        // dd($category);
        return view('confirm', compact('category','contact'));
    }

    //確認画面で送信ボタンをクリック
    public function store(Request $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'category_id', 'gender', 'email', 'tell', 'address', 'building', 'detail']);
        // dd($contact);
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
            $query->GenderSearch($request->gender);
        }

        $contacts = $query->Paginate(7);
        $categories = Category::all();

        return view('admin', compact('categories', 'contacts'));
    }
}
