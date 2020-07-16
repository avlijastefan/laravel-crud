<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index (Request $request)
    {
        $page_title = 'Index';
        
        return view('index',[
            'page_title' => $page_title
        ]);
    }
}
