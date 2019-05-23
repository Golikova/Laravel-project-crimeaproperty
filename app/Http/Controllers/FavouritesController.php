<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Post;
use Session;
use App;

class FavouritesController extends Controller
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
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $favs = $user->favourites;

        $post_ids[''] = '';

        foreach ($favs as $fav) {
        	array_push($post_ids, $fav->post_id);
        }
        $posts = Post::whereIn('id', $post_ids)->get();

        return view('favourites')->with('posts', $posts);
    }
}
