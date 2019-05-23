<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use Session;
use App;

class DashboardController extends Controller
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == 1) {
            redirect('/admin');
        }

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('dashboard')->with('posts', $user->posts);
    }
}
