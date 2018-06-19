<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;
use Session;
class RepliesController extends Controller
{
    //


    public function best_answer($id)
    {
    	$reply = Reply::find($id);


    	$reply->best_answer = 1;

    	$reply->save();

    	return redirect()->back();
    }


     public function edit($id)
    {
    	$reply = Reply::find($id);




    	return view('replies.edit')->with('reply',$reply);
    }


      public function update(request $request,$id)
    {

    		 $this->validate($request,[

            'content' => 'required'
        ]);


        $reply = Reply::find($id);



        $reply->content = $request->content;

        $reply->save();

        session::flash('success','Reply Updated');

        return redirect()->back();






    }
}
