<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
        return view('home.index', compact('names'));
    }

    public function show($name)
    {
        return view('home.show', compact('name'));
    }
}
