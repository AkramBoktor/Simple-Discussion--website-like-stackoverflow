<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Discussion;
use App\Channel;
use Auth;
class ForumsController extends Controller
{
    //

    public function index()

    {
    	//$discussion = Discussion::orderBy('created_at','desc')->paginate(3); /* to get just 3 row 

            switch(request('filter'))
            {
                case 'me':

                    $result = Discussion::where('user_id',Auth::id())->paginate(3);

                break;

                default:

                $result = Discussion::orderBy('created_at','desc')->paginate(3); /* to get just 3 row */


                break;
            }

    	return view('forum')->with('discussion',$result);
    }



    public function channel($slug)
    {
    		$channel = Channel::where('slug',$slug)->first();
    		return view('channel')->with('discussion',$channel->discussions()->paginate(5));
            /* paginate for links under the page */

    }
}
