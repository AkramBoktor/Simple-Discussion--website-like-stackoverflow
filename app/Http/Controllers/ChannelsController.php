<?php

namespace App\Http\Controllers;
use App\Channel;
use Illuminate\Http\Request;
use Session;
class ChannelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    /* public function construct to make middleware */

    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        //

        return view('channels.index')->with('channels',Channel::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('channels.create');
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

            'title' =>'required',
            'slug' => str_slug($request->channel)
        ]);


        Channel::create([

            'title' => $request->title
        ]);

        session::flash('success','channel Created');

        return redirect()->route('channels.index');
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
        //

       $channel = Channel::find($id);

        return view('channels.edit')->with('channel',$channel);
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

       
        $channel = Channel::find($id);

        $channel->title = $request->title;
        $channel->slug = str_slug($request->channel);

        $channel->save();

        session::flash('success','channel Updated');

        return redirect()->route('channels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         Channel::destroy($channel);

        session::flash('success','channel Destoryed');

        return redirect()->route('channels.index');


    }
}
