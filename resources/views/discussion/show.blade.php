@extends('layouts.app')

@section('content')
 <div class="card">
                <div class="card-header">
                    
                    <img src="../{{$discussion->user->avatar}}" width="40px" height="40" style="border-radius: 50%">

                    <span>{{$discussion->user->name}} , {{$discussion->created_at->diffForHumans()}}</span>

                    <span> 
                    <a 
                       href="{{route('discussion.edit',['slug'=>$discussion->slug])}}" 
                       class="btn btn-info btn-sm">Edit Discussion</a></span>
                </div>

             <div class="card-body">

                  <h4 class="text-center">
                    <b>{{$discussion->title}}</b>
                  </h4>

                   <hr>
                   <p class="text-center">
                    {{$discussion->content}}

                   </p>

              </div>

              <div class="card-footer">
                        <p>
                           {{$discussion->replies->count()}} Replies
                        </p>
              </div>






 </div>
    </br>


        @foreach($discussion->replies as $reply)

 <div class="card">
                <div class="card-header">
                    
                    <img src="../{{$reply->user->avatar}}" width="40px" height="40" style="border-radius: 50%">

                    <span>{{$reply->user->name}} , {{$reply->created_at->diffForHumans()}}</span>


                      @if(Auth::id()==$reply->user->id)

                          <a href="{{route('reply.edit',['id'=>$reply->id])}}" class="btn btn-primary btn-sm"> Edit Reply </a>

                      @endif
                </div>

             <div class="card-body">

                  <h4 class="text-center">
                    <b>{{$reply->title}}</b>
                  </h4>

                   <hr>
                   <p class="text-center">
                    {{$reply->content}}

                   </p>
                   <hr>

<!--- ------------------------- Best Answer --------!-->

               @if($best_answer)

                    <h2 class="text-center text text-success"> Best Answer </h2>


                <div class="card-header">
                    
                    <img src="../{{$best_answer->user->avatar}}" width="40px" height="40" style="border-radius: 50%">

                    <span>{{$best_answer->user->name}}</span>


                </div>

             <div class="card-body">

                  <h4 class="text-center">
                    <b>{{$best_answer->title}}</b>
                  </h4>

                   <hr>
                   <p class="text-center">
                    {{$best_answer->content}}

                   </p>

                     
             </div>
         @endif
              
              
<!--- ------------------------- Like and unlike --------!-->

              <div class="card-footer">
                      
                     @if($reply->is_like_by_aut_user())

                        <a href="{{route('reply.unlike',['id'=>$reply->id])}}" class="btn btn-danger btn-sm">Unlike <span class="badge badge-light">{{$reply->likes->count()}}</span></a>

                     @else

                       <a href="{{route('reply.like',['id'=>$reply->id])}}" class="btn btn-info btn-sm">like <span class="badge badge-light">{{$reply->likes->count()}}</span></a>

                     @endif


<!-------------- button to make best answer -------!-->
                     @if(!$best_answer)

                        @if(Auth::id() == $discussion->user->id) 
                          <a href="{{route('discussion.best.answer',['id' => $reply->id])}}" class="btn btn-warning btn-sm"> Mark as Best Answer </a>
                        @endif
                     @endif

              </div>

 </div>

        @endforeach




        @if(Auth::check())



            <div class="card">
                <div class="card-header">Create a New Reply</div>

                <div class="card-body">
                   
                 <form method="post" action="{{route('discussion.reply',['id' => $discussion->id])}}">

                        {{ csrf_field() }}

                         <div class="form-group">
                            <label for="content">Make Reply</label>
                            <textarea name="content" id="content" class="form-control" cols="30" rows="10">
                                
                            </textarea> 
                        </div>

                         <div class="form-group text-center">
                            
                            <button type="submit" class="btn btn-success pull-right">
                              leave a Reply
                           </button>
                        </div>


                    </form>

              </div>
        </div>


        @else

            <div class="text-center">

              <h2> Sign in to leave a reply </h2>

            </div>
        @endif
    

@endsection
