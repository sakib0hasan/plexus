<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function form($id)
    {
        $comments = Comment::where('bill_no', $id)->get();

        return view('dashboard.comment')->with('id', $id)->with('comments', $comments);
    }

    public function postComment(Request $request, $id)
    {
        //put validation here if necessary.
        $comment_data = [
            'description' => $request->description,
            'bill_no' => $id
        ];

//        dd($comment_data);
        $comment = Comment::create($comment_data);
        $comment->user_id = Auth::user()->id;
        $comment->save();
        return redirect()->back();
    }

}
