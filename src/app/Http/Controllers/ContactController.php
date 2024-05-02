<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(Request $request)
    {
        $contact = $request->only([
            'last_name', 'first_name', 'gender', 'email',
            'toptel', 'middletel', 'bottomtel', 'address',
            'building', 'content', 'detail'
        ]);
        return view('confirm', compact('contact'));
    }

    public function store(Request $request)
    {
        $contact = $request->only(['first_name', 'last_name',  'gender', 'email', 'tell', 'address', 'building', 'detail']);
        $category = $request->only(['content']);
    }
}
