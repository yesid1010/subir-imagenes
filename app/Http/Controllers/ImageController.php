<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Image;
use App\User;

class ImageController extends Controller
{
    //

    // funcion para crear una foto
    public function create(Request $request){
        $path = Storage:: disk('public')->put('image',$request->url);
        $image = new Image();
        $image->url = asset($path);
        $image->user_id = auth()->id();
        $image->save();

        return $image;
    }

    //funcion para ver todas las fotos
    public function index(Request $request){
        if($request->ajax()){
            $images = Image::orderBy('id','DESC')->get();
            return $images;
        }else {
            return view('home');
        }
    }

    //funcion para ver una foto
    public function show(Request $request,$image_id){

        if($request->ajax()){
            $image = Image::find($image_id);
            return $image;
        }else {
            return view('home');
        }

    }

    // funcion para ver las fotos del usuario logueado
    public function photos(){
        $images = Image::where('user_id',auth()->id())->orderBy('id','DESC')->get();
        return $images;
    }


    // funcion para borrar una imagen
    public function destroy($id){
        $image = Image::find($id);
        $image->delete();
    }

    public function userss(){
        return User::find(auth()->id());
    }

}


