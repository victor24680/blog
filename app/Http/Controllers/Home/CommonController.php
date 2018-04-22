<?php

namespace App\Http\Controllers\Home;
use App\Http\Model\Navs;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;

class CommonController extends Controller
{
    //
    public function __construct()
    {
        $navlist=Navs::orderBy('nav_order','desc')->orderBy('nav_id','asc')->get();
        View::share('navlist',$navlist);
    }
}
