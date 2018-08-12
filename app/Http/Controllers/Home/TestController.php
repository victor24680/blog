<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/29 0029
 * Time: 下午 11:25
 */

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use App\Contracts\Borrow;

class TestController extends Controller
{
    public function index()
    {
        Borrow::create();
    }
}