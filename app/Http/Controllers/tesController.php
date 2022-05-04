<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tesController extends Controller
{
    public function store(Request $request)
    {
        dd($request->all());
    }
}
