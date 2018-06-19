<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

use App\Discussion;
use App\Reply;
use App\user;
use Notification;

class DiscussionsController extends Controller
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
        return view('discuss');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

         $this->validate($request,[

            'channel_id' =>'required',
            'content' =>'required',
            'title' =>'required'

        ]);


      $discussion = Discussion::create([

                'title' => $request->title,
                'content' => $request->content,
                'channel_id' => $request->channel_id,
                'user_id' =>Auth::id(),
                'slug'=> str_slug($request->title),

      ]);

        session::flash('success','Discussion Created');

        return redirect()->route('discussion',['slug' => $discussion->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //

        $discussion = Discussion::where('slug',$slug)->first();

        $best_answer = $discussion->replies()->where('best_answer',1)->first();
        
        return view('discussion.show')->with('discussion', $discussion)
                                      ->with('best_answer',$best_answer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
        $discussion = Discussion::Where('slug',$slug)->first();
        return view('discussion.edit')->with('discussion',$discussion);
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
        //
        $this->validate($request,[

            'content' => 'required'
        ]);


        $discussion = Discussion::find($id);


        $discussion->content = $request->content;

        $discussion->save();

        session::flash('success','Discuccion Updated');

        return redirect()->route('discussion',['slug'=>$discussion->slug]);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reply(Request $request,$id)
    {
        //
        $d = Discussion::find($id);
        $reply = Reply::create([
           'discussion_id' => $id,
            'content' => $request->content,
            'user_id' => Auth::id(),
        

        ]);

        session::flash('success','Reply Created');

        return redirect()->back();
    }
}
