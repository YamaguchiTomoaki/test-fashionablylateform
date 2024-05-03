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

    public function confirm(Request $request)
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
        $contact = $request->only(['first_name', 'last_name',  'gender', 'email', 'tell', 'address', 'building', 'category_id', 'detail']);
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
        Contact::create($contact);
        return view('thanks');
    }
}
