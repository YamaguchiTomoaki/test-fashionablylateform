<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Support\Arr;
use Illuminate\Pagination\Paginator;

class AdminController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function admin()
    {
        $categories = Category::all();
        //$contacts = Contact::all();
        $contacts = Contact::Paginate(7);


        return view('admin', compact('categories'), ['contacts' => $contacts]);
    }

    public function search(Request $request)
    {
        $contacts = Contact::KeywordSearch($request->keyword)->GenderSearch($request->gender)->CategotySearch($request->category_id)->DateSearch($request->date)->Paginate(7);
        //dd($contacts);
        $categories = Category::all();

        return view('admin', compact('categories'), ['contacts' => $contacts]);
    }
}
