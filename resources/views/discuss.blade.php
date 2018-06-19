@extends('layouts.app')

@section('content')

<div class="container">

            <div class="card">
                <div class="card-header">Create a New Discussion</div>

                <div class="card-body">
                   
                 <form method="post" action="{{route('discussion.store')}}">

                        {{ csrf_field() }}

                           <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                    

                         <div class="form-group">
                            <label for="title">Pick channel</label>
                            <select name="channel_id" id="channel_id" class="form-control">
                                
                                @foreach($channels as $channel)
                                <option value="{{$channel->id}}">
                                    
                                    {{$channel->title}}

                                </option>

                                @endforeach
                            </select>
                        </div>

                         <div class="form-group">
                            <label for="content">Ask Question</label>
                            <textarea name="content" id="content" class="form-control" cols="30" rows="10">
                                
                            </textarea> 
                        </div>

                         <div class="form-group text-center">
                            
                            <button type="submit" class="btn btn-success">
                              Create Discussion
                           </button>
                        </div>


                    </form>

              </div>
        </div>

</div>
@endsection
