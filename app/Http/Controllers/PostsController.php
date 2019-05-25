<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Storage;

use App\Http\Requests;
use App\Post;
use App\Image;
use App\Types;
use App\Favourite;
use App\City;
use DB;
use Session;
use App;
use Lang;
use Auth;


class PostsController extends Controller
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
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        foreach ($posts as $post) {
            $city = (City::where('id',$post->city_id)->get());
            $post->city = $city[0]->name;
        }
        
        $images = [''=>''];
        foreach ($posts as $post) {
           $result = Image::where('post_id', $post->id)->get();
           if (count($result)>0) {
               $images[$post->id] = $result[0]->image;
           }
       }
       return view('posts.index')->with('posts', $posts)->with('images', $images)->with('title', Lang::get('posts.all'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $cities = City::lists('name', 'id');

        $types = Types::lists('name', 'id');
        return view('posts.create')->with('types', $types)->with('cities', $cities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->status == 'blocked') {
            return redirect('/posts')->with('error', 'Ваш аккаунт заблокирован! Обратитесь к администратору');
        }
        else {

            $this->validate($request, [
                'title' => 'required',
                'image.*' => 'image|max:1999',
                'mobile' => 'required|numeric',
                'price' => 'required|numeric',
            ]);


            $images = $request->file('image');

        //Get next id for image storage

            $statement = DB::select("SHOW TABLE STATUS LIKE 'posts'");
            $post_id = $statement[0]->Auto_increment;

        //Create post

            $post = new Post;
            $post->title = $request->input('title');
            $post->body = $request->input('description');
            $post->price = $request->input('price');
            $post->mobile = $request->input('mobile');
            $post->city_id = ($request->input('cities')[0]);
            $post->street = $request->input('street');
            $post->house = $request->input('house');
            $post->apartment = $request->input('apartment');
            $post->type_id = ($request->input('types')[0]);
            $post->user_id = auth()->user()->id;
            $post->save();

        //Store photos
            if(!empty($images)){
                foreach ($images as $image) {
                    $fileNameToStore= uniqid().'.'.$image->getClientOriginalExtension();;
                // Upload Image
                    $path = $image->move('user_images', $fileNameToStore);

                    $img = new Image;
                    $img->image = $fileNameToStore;
                    $img->post_id = $post_id;
                    $img->save();
                }
            }
            else {
                $defaultImage = 'noImage.png';
                $img = new Image;
                $img->image = $defaultImage;
                $img->post_id = $post_id;
                $img->save();
            }

            return redirect('/posts')->with('success', '');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $city = (City::where('id',$post->city_id)->get());
        $post->city = $city[0]->name;
        $images = Image::where('post_id', $id)->get();
        if (!Auth::guest())
            $fav = Favourite::where('post_id', $id)->where('user_id', auth()->user()->id)->get();
        else 
            $fav = null;
        if (count($fav) ==0) {
            $fav = false;
        }
        else $fav = true;

        return view('posts.show')->with('post', $post)->with('images', $images)->with('fav', $fav);
    }

  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function showHouse()
  {
    $posts = Post::where('type_id', '5')->orderBy('created_at', 'desc')->paginate(5);
    $images = [''=>''];
    foreach ($posts as $post) {
       $result = Image::where('post_id', $post->id)->get();
       if (count($result)>0) {
           $images[$post->id] = $result[0]->image;
       }
   }

   return view('posts.index')->with('posts', $posts)->with('images', $images)->with('title', Lang::get('nav.houses'));
}

public function showApartment1()
{
    $posts = Post::where('type_id', '2')->orderBy('created_at', 'desc')->paginate(5);
    $images = [''=>''];
    foreach ($posts as $post) {
       $result = Image::where('post_id', $post->id)->get();
       if (count($result)>0) {
           $images[$post->id] = $result[0]->image;
       }
   }

   return view('posts.index')->with('posts', $posts)->with('images', $images)->with('title',Lang::get('nav.apartment1'));
}

public function showApartment2()
{
    $posts = Post::where('type_id', '3')->orderBy('created_at', 'desc')->paginate(5);
    $images = [''=>''];
    foreach ($posts as $post) {
       $result = Image::where('post_id', $post->id)->get();
       if (count($result)>0) {
           $images[$post->id] = $result[0]->image;
       }
   }

   return view('posts.index')->with('posts', $posts)->with('images', $images)->with('title', Lang::get('nav.apartment2'));
}

public function showApartment3()
{
    $posts = Post::where('type_id', '4')->orderBy('created_at', 'desc')->paginate(5);
    $images = [''=>''];
    foreach ($posts as $post) {
       $result = Image::where('post_id', $post->id)->get();
       if (count($result)>0) {
           $images[$post->id] = $result[0]->image;
       }
   }

   return view('posts.index')->with('posts', $posts)->with('images', $images)->with('title', Lang::get('nav.apartment3'));
}

public function showStudio()
{
    $posts = Post::where('type_id', '1')->orderBy('created_at', 'desc')->paginate(5);
    $images = [''=>''];
    foreach ($posts as $post) {
       $result = Image::where('post_id', $post->id)->get();
       if (count($result)>0) {
           $images[$post->id] = $result[0]->image;
       }
   }

   return view('posts.index')->with('posts', $posts)->with('images', $images)->with('title', Lang::get('nav.studio'));
}

public function showArea()
{
    $posts = Post::where('type_id', '6')->orderBy('created_at', 'desc')->paginate(5);
    $images = [''=>''];
    foreach ($posts as $post) {
       $result = Image::where('post_id', $post->id)->get();
       if (count($result)>0) {
           $images[$post->id] = $result[0]->image;
       }
   }

   return view('posts.index')->with('posts', $posts)->with('images', $images)->with('title',Lang::get('nav.area'));
}

public function showGarage()
{
    $posts = Post::where('type_id', '7')->orderBy('created_at', 'desc')->paginate(5);
    $images = [''=>''];
    foreach ($posts as $post) {
       $result = Image::where('post_id', $post->id)->get();
       if (count($result)>0) {
           $images[$post->id] = $result[0]->image;
       }
   }

   return view('posts.index')->with('posts', $posts)->with('images', $images)->with('title', Lang::get('nav.garage'));
}

public function showOther()
{
    $typesList = [1, 2, 3, 4, 5, 6, 7];
    $posts = Post::whereNotIn('type_id', $typesList)->orderBy('created_at', 'desc')->paginate(5);
    $images = [''=>''];
    foreach ($posts as $post) {
       $result = Image::where('post_id', $post->id)->get();
       if (count($result)>0) {
           $images[$post->id] = $result[0]->image;
       }
   }

   return view('posts.index')->with('posts', $posts)->with('images', $images)->with('title', Lang::get('nav.other'));
}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        //Check for correct user
        if (!Auth::guest()) {
            if (auth()->user()->role == 0){
                if(auth()->user()->id != $post->user_id) 
                    return redirect('/posts')->with('error', '');
            }
        }

        $cities = City::lists('name', 'id');
        $types = Types::lists('name', 'id');
        $images = Image::where('post_id', $id)->get();
        return view('posts.edit')->with('post', $post)->with('types', $types)->with('images', $images)->with('cities', $cities);
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
            'title' => 'required',
            'image.*' => 'image|max:1999',
            'mobile' => 'required|numeric',
            'price' => 'required|numeric',
        ]);


        $images = $request->file('image');

        //Create post

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('description');
        $post->price = $request->input('price');
        $post->mobile = $request->input('mobile');
        $post->city_id = ($request->input('cities')[0]);
        $post->street = $request->input('street');
        $post->house = $request->input('house');
        $post->apartment = $request->input('apartment');
        $post->type_id = ($request->input('types')[0]);
        $post->user_id = auth()->user()->id;
        $post->save();

        $post_id=$post->id;

        //Store photos
        if($images[0]){
            foreach ($images as $image) {

                $fileNameToStore= uniqid().'.'.$image->getClientOriginalExtension();;
                // Upload Image
                $path = $image->move('user_images', $fileNameToStore);

                $img = new Image;
                $img->image = $fileNameToStore;
                $img->post_id = $post_id;
                $img->save();

            }
        }

        return redirect('/posts')->with('success', 'Объявление успешно изменено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        if (auth()->user()->role == 0){
            if(auth()->user()->id != $post->user_id) 
                return redirect('/posts')->with('error', '');
        }

        $post->delete();
        $images=Image::where('post_id', $id)->get();

            // Delete Image
        foreach ($images as $image) {
            if($image->image != 'noimage.png'){
                Storage::delete('public/user_images/'.$image->image);
            }
            $image->delete();
        }

        
        return redirect('/posts')->with('success', 'Объявление удалено');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function removeImage(Request $request)
     {
        $image = Image::find($request->input('id'))->delete();
        echo "Data deleted";
    }

    public function like(Request $request)
    {

        if($request->ajax())
        {
           $fav = Favourite::where('post_id', $request->input('id'))->where('user_id', auth()->user()->id)->get();

           if (count($fav) ==0) {
            $isFav = false;
        }
        else $isFav = true;

        if ($isFav) {
            $delFav = Favourite::find($fav[0]->id)->delete();
            echo "heart-empty";
        }
        else{
            $fav = new Favourite;
            $fav->post_id = $request->input('id');
            $fav->user_id = auth()->user()->id;
            $fav->save();
            echo "heart";
        }




    }

}
}

