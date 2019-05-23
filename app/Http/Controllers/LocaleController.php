<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Session;

use App\Http\Requests;

class LocaleController extends Controller
{
    function setRus() {
    	Session::put('locale','ru');
    	return redirect()->back();
    }

    function setEng() {
    	Session::put('locale','en');
    	return redirect()->back();
    }
}
