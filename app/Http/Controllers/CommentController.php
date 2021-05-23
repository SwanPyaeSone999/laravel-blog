<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function add(Request $request)
    {
        // dd($request->all());
            $comment = new Comment();
            $comment->user_id = auth()->user()->id;
            $comment->content = $request->content;
            $comment->article_id = $request->article_id;
            $comment->save();
            return back();
    }
    public function delete($id)
    {
        $comment = Comment::find($id);
        if($comment->user_id == auth()->user()->id) {
            $comment->delete();
            return back();
            } else {
            return back()->with('error', 'Unauthorize');
            }
    }
}
