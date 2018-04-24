<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use Request as Input;
class CommonController extends Controller
{
    public function isLogin(){
        $check_session=session('user');
        if(!$check_session){
            return false;
        }else{
            return true;
        }
    }


}



