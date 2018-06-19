<?php



Route::get('/', function () {
    return view('welcome');
});

/**********************************************/
/****** channel********/



Route::get('channel/{slug}',[ 
   
	"uses" => 'ForumsController@channel',
	"as"   => 'channel'

]);



Route::get('/All_channels',[ 
   
	"uses" => 'ChannelsController@index',
	"as"   => 'channels.index'

]);

/******* Forums **************/

Route::get('/forum', [

	"uses" => 'ForumsController@index',
	"as"   => 'forum'

]);
Auth::routes();


/************* Group middleware Auth ***********/

Route::group(['middleware' => 'auth'] , function(){






/****************************************/


Route::resource('channels','ChannelsController');


/********* Social authentication *********/

Route::get('{provider}/auth',[


	'uses'  => 'SocialController@auth',

	'as' => 'social.auth'

]);

Route::get('{provider}/redirect',[


	'uses'  => 'SocialController@auth_callback',

	'as' => 'social.callback'

]); 



/********************************************/
/************* Discussion Routes ***************/
Route::get('discussion/create',[

	'uses' => 'DiscussionsController@create',

	'as' => 'discussion.create'

]);



Route::post('discussion/store',[

	'uses' => 'DiscussionsController@store',

	'as' => 'discussion.store'

]);

Route::get('discussion/{slug}',[

	'uses' => 'DiscussionsController@show',

	'as' => 'discussion'

]);


Route::post('discussion/reply/{id}',[

	'uses' => 'DiscussionsController@reply',

	'as' => 'discussion.reply'

]);

Route::get('discussion/edit/{slug}',[

	'uses' => 'DiscussionsController@edit',

	'as' => 'discussion.edit'

]);

Route::post('discussion/update/{id}',[

	'uses' => 'DiscussionsController@update',

	'as' => 'discussion.update'

]);





/**********************************************/
/************ Reply Controller **********/
Route::get('/reply/like/{id}',[

	'uses' => 'LikeController@like',

	'as' => 'reply.like'


]);

Route::get('/reply/unlike/{id}',[

	'uses' => 'LikeController@unlike',

	'as' => 'reply.unlike'


]);

Route::get('/reply/edit/{id}',[

	'uses' => 'RepliesController@edit',

	'as' => 'reply.edit'


]);

Route::post('/reply/update/{id}',[

	'uses' => 'RepliesController@update',

	'as' => 'reply.update'


]);

Route::get('/discussion/best/reply/{id}',[

	'uses' => 'RepliesController@best_answer',
	'as'   => 'discussion.best.answer'

]);


});


