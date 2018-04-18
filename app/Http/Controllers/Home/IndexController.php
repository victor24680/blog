<?php

namespace App\Http\Controllers\Home;
class IndexController extends CommonController
{
    public function index()
    {
        return view('home.index');
    }
    
    public function lists()
    {
        return view('home.list');
    }
    
    public function detail()
    {
        return view('home.new');
    }
}
