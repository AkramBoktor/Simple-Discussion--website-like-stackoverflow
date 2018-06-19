@extends('layouts.app')

@section('content')
<div class="container">
  
            <div class="card">
                <div class="card-header">Edit Channel : {{$channel->title}}</div>

                <div class="card-body">
                   
                    <form method="post" action="{{route('channels.update',['channel'=>$channel->id])}}">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}


                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" class="form-control" name="title" value="{{$channel->title}}">
                        </div>

                         <div class="form-group text-center">
                            
                            <button type="submit" class="btn btn-success">
                              Update Channel 
                           </button>
                        </div>


                    </form>

                </div>
            </div>
       
</div>
@endsection
