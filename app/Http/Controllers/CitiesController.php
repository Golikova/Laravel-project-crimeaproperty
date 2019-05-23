<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\City;
use Auth;
use Session;
use Lang;
use App;

class CitiesController extends Controller
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
            $cities = City::orderBy('created_at', 'desc')->paginate(10);
            return view('admin.cities')->with('cities', $cities);
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
            'name' => 'required|max:255|unique:cities',
            
        ]);

        $city = new City;
        $city->name = $request->input('name');
        $city->save();   
        return redirect('/cities')->with('success', '');
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
        $city=City::find($id);

        $city->delete();
            
        return redirect('/cities')->with('success', '');
    }
    }
}
