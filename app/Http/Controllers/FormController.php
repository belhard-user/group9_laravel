<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        return view('form.form');
    }


    public function store(TestRequest $request)
    {
        $validate = \Validator::make(['tumba' => ''], ['tumba' => 'required']);
        dump($validate->parseData(['Name.people' => 'neo' , 'age' => 23]));
        dd(get_class_methods($validate));

        return $request->all();
    }
}
