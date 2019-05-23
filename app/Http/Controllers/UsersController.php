<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use Session;
use Lang;
use App;

class UsersController extends Controller
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
            $users = User::orderBy('created_at', 'desc')->paginate(10);
            return view('admin.users')->with('users', $users);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = new User;
        $user->name = $request->input('name');
        $user->password = $request->input('password');
        $user->email = $request->input('email');
        $user->role = $request->input('role');    
        $user->save();   
        return redirect('/users')->with('success', '');
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
                $user = User::find($id);
                return view('admin.edituser')->with('user', $user);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);

        $user = User::find($id);

        $user->name = $request->input('name');
        $user->password = $request->input('password');
        $user->email = $request->input('email');
        $user->role = $request->input('role');    
        $user->status = $request->input('status');  
        $user->save();   
        return redirect('/users')->with('success', '');
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
        $user=User::find($id);

        $user->delete();
            
        return redirect('/users')->with('success', '');
    }
    }
}
