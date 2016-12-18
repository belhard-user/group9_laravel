<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index()
    {
        $names = [
            'Neo',
            'Morpheus',
            'Tank',
            'Trinity',
            'Dozer',
            'Smith'
        ];

        return view('hello.index', compact('names'));
    }
    
    public function show($name)
    {
        return view('hello.show', compact('name'));
    }
}
