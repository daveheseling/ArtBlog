<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function commentStore(Request $request, $post_id)
    {
        $this->validate($request, array(
            'comment_body' => 'required|max:200'
        ));

        $post = Post::find($post_id);

        $comment = new Comment;
        $comment->comment_body = $request->comment_body;
        $comment->user_id=1;
        $comment->post()->associate($post);

        $comment->save();


        Session::flash('success','Comment was added!');

        return redirect()->route('postSingle', $post->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function commentShow($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function commentEdit($id)
    {
        $comment = Comment::find($id);

        return view('comments.commentEdit', ['comment'=>$comment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function commentUpdate(Request $request, $id)
    {
        //
    }


    public function commentDelete($id)
    {
        $comment = Comment::find($id);

        return view('comments.commentDelete', ['comment'=>$comment]);
    }


    public function commentDestroy($id)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post_id;
        $comment->delete();

        Session::flash('success', 'Comment was deleted');

        return redirect()->route('postShow', $post_id);
    }
}
