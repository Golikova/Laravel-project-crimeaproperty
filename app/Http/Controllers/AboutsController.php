<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\About;
use App\Aboutsen;
use Auth;
use Session;
use Lang;
use App;

class AboutsController extends Controller
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
            $this->middleware('auth', ['except'=>['index', 'show']]);
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guest() || auth()->user()->role != 1)
            return   redirect('/login')->with('error', Lang::get('validation.authError'));
        else {
            $lang = Session::get ('locale');
            if ($lang == 'en') {
                $abouts = Aboutsen::orderBy('created_at', 'desc')->paginate(10);
                return view('admin.about')->with('abouts', $abouts);
            }
            else {
                $abouts = About::orderBy('created_at', 'desc')->paginate(10);
                return view('admin.about')->with('abouts', $abouts);
            }
            
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required'
        ]);
        $lang = Session::get ('locale');

            if ($lang == 'en') {
                 $about = new Aboutsen;

            }
            else {
                $about = new About;
            }

        $about->title = $request->input('title');
        $about->body = $request->input('body');
        $about->save();   
        return redirect('/abouts')->with('success', '');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       if (Auth::guest() || auth()->user()->role != 1)
        return   redirect('/login')->with('error', Lang::get('validation.authError'));
    else {
        $lang = Session::get ('locale');
            if ($lang == 'en') {
                 $about = Aboutsen::find($id);
            }
            else {
                $about = About::find($id);
            }
        return view('admin.editabout')->with('about', $about);
    }
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required'
        ]);

        $lang = Session::get ('locale');
            if ($lang == 'en') {
                 $about = Aboutsen::find($id);
            }
            else {
                $about = About::find($id);
            }

        $about->title = $request->input('title');
        $about->body = $request->input('body');
        $about->save();   
        return redirect('/abouts')->with('success', '');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::guest() || auth()->user()->role != 1)
            return   redirect('/login')->with('error', Lang::get('validation.authError'));
        else {
            $lang = Session::get ('locale');
            if ($lang == 'en') {
                 $about = Aboutsen::find($id);
            }
            else {
                $about = About::find($id);
            }

            $about->delete();
            
            return redirect('/abouts')->with('success', '');
        }
    }
}
