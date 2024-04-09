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
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tell', 'address', 'building', 'category_id','detail']);
        // dd($contact);
        return view('confirm', compact('contact'));
    }

    //確認画面で送信ボタンをクリック
    public function store(Request $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'category_id','gender', 'email', 'tell', 'address', 'building', 'detail']);
        // dd($contact);
        Contact::create($contact);
        return view('thanks');
    }
}
