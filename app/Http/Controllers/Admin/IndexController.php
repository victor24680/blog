<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
class IndexController extends CommonController
{
    public function __construct() {

    }
    
    public function index(){
        
    	return view('admin.index')->with('username',session('user')->username);
    }

    public function info(){
    	return view('admin.info');
    }

    public function add(){
        return view('admin.add');
    }

    public function tab(){
        return view('admin.tab');
    }
    
    public function lists(){
        return view('admin.list');
    }
    
    public function img(){
        return view('admin.img');
    }
}
