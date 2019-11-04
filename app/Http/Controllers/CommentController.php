<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    //

    public function create(Request $request){

        $comment = new Comment();
        $comment->user_id = auth()->id();
        $comment->image_id = $request->image_id;
        $comment->comment = $request->comment;

        $comment->save();

        return $comment;
    }

    public function show($image_id){
        
        $comments = Comment::where('image_id',$image_id)->get();
        return $comments;
    }
}
