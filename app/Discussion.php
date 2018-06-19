<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    //


    protected $fillable =['title' , 'content','user_id','channel_id','slug'];


    public function channel()   /* one to many */

    {
    	return $this->belongsTo('App\Channel');
    }


    public function user() /* one to one */
    {

    	return $this->belongsTo('App\User');

    }

    public function replies()
    {
    	return $this->hasMany('App\Reply');
    }


    public function hasBestAnswer()
    {

        $result = false ;
        foreach($this->replies as $reply)
        {

            if($reply->best_answer)
            {
                $result = true;

                break ;
            }

        }

        return $result;

    }

}
