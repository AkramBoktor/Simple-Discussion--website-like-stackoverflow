<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\Reply;
use App\Like;

class LikeController extends Controller
{
    //

    public function like($id)
    {
    	$reply=Reply::find($id);

    	Like::create([

    		'reply_id' => $id,
    		'user_id'  => Auth::id(),
    	]);

    	session::flash('sucess','You liked the Reply');

    	return redirect()->back();
    }


     public function unlike($id)
    {
    	$like=Like::where('reply_id',$id)->where('user_id',Auth::id())->first(); 
    	/* all of this come from table like */

    	$like->delete();

    	session::flash('sucess','You unlike the Reply');

    	return redirect()->back();
    }
}
