<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only([
            'last_name', 'first_name', 'gender', 'email',
            'toptel', 'middletel', 'bottomtel', 'address',
            'building', 'category_id', 'detail'
        ]);
        $category = Category::find($contact['category_id']);
        return view('confirm', compact('contact', 'category'));
    }

    public function store(Request $request)
    {
        // 修正ボタン処理の為、toptel,middletel,bottomtelも取得
        $contact = $request->only(['first_name', 'last_name',  'gender', 'email', 'tell', 'address', 'building', 'category_id', 'detail', 'toptel', 'middletel', 'bottomtel']);
        // ラジオボタンの内容をDB登録時はtinyintの為、数値に変更
        switch ($contact['gender']) {
            case "男性":
                $contact['gender'] = 1;
                break;
            case "女性":
                $contact['gender'] = 2;
                break;
            case "その他":
                $contact['gender'] = 3;
                break;
        }
        // 修正ボタン処理
        if ($request->input('correction') == 'back') {
            return redirect('/')->withInput();
        }

        Contact::create($contact);
        return view('thanks');
    }
}
