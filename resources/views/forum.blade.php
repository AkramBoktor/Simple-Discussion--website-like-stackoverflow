@extends('layouts.app')

@section('content')

    @foreach($discussion as $d)
            <div class="card">
                <div class="card-header">
                    
                    <img src="{{$d->user->avatar}}" width="40px" height="40" style="border-radius: 50%">
                    <span>{{$d->user->name}} , {{$d->created_at->diffForHumans()}}</span>

                    <a href="{{route('discussion',['slug' => $d->slug])}}" class="btn btn-default pull-right">
                        View
                    </a>

                    @if($d->hasBestAnswer())

                    <span class="btn btn-danger"> Close </a>
                    @else

                    <span class="btn btn-success"> Open </a>

                    @endif

                </div>

                <div class="card-body">

                  <h4 class="text-center">
                    {{$d->title}}
                 </h4>

                    <p class="text-center">

                        {{str_limit($d->content,100)}}
                    </p>
              </div>

              <div class="card-footer">

                <span>{{$d->replies->count()}} Replies </span>
                    


                <a href="{{route('channel',['slug'=>$d->channel->slug])}}" 
                    class="pull-right btn btn-default">{{$d->channel->title}} 
                </a>

              </div>

        </div>
    </br>
    @endforeach



    <div class="text-center">
        {{$discussion->Links()}}
    </div>

@endsection
