<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Session;
use Lang;
use App\User;
use App;

class AdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
        public function __construct()
        {
        	$lang = Session::get ('locale');
        	if ($lang != null) App::setLocale($lang);
        }


        public function index() {
        	if (Auth::guest() || auth()->user()->role != 1)
        		return   redirect('/login')->with('error', Lang::get('validation.authError'));
        	else 
        		return view('admin.index');
        }



}


