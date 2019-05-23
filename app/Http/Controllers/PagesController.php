<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App;
use Auth;
use App\About;
use App\Aboutsen;

use App\Http\Requests;

class PagesController extends Controller
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
            if (!Auth::guest()){
                if (auth()->user()->role == 1)
                return   redirect('/admin');
        }

        	return view('pages.index', compact('title'));
        }

        public function about() {
        	
                 $lang = Session::get ('locale');
            if ($lang == 'en') {
                $abouts = Aboutsen::orderBy('created_at', 'asc')->paginate(10);
                return view('pages.about')->with('abouts', $abouts);
            }
            else {
                $abouts = About::orderBy('created_at', 'asc')->paginate(10);
                return view('pages.about')->with('abouts', $abouts);
            }
            
        }

    }
