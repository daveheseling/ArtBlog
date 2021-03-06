<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tagList()
    {
        $tags = Tag::all();

        return view('tags.tagList', ['tags'=>$tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tagCreate()
    {

        return view('tags.tagCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tagStore(Request $request)
    {
        $this->validate($request, array(
           'name' => 'required|max:255'
        ));

        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();

        Session::flash('success','The tag was added!');

        return redirect()->route('tagStore');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tagShow($id)
    {
        $tag = Tag::find($id);

        return view('tags.tagShow', ['tag' => $tag]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tagEdit($id)
    {
        $tag = Tag::find($id);

        return view('tags.tagEdit', ['tag'=>$tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tagUpdate(Request $request, $id)
    {
        $tag = Tag::find($id);

        $this->validate($request, array(
            'name' => 'required|max:255'
        ));


        $tag->name = $request->input('name');
        $tag->save();

        Session::flash('success','The tag was changed!');

        return redirect()->route('tagShow', $tag->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tagDestroy($id)
    {
        $tag = Tag::find($id);
        $tag->posts()->detach();

        $tag->delete();

        Session::flash('success','Tag was deleted!');

        return redirect()->route('tagList');
    }
}
