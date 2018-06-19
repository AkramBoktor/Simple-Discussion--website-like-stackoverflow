@extends('layouts.app')

@section('content')
<div class="container">
 
            <div class="card">
                <div class="card-header">Create New Channel</div>

                <div class="card-body">
                   
                    <form method="post" action="{{route('channels.store')}}">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>

                         <div class="form-group text-center">
                            
                            <button type="submit" class="btn btn-success">
                              Save Channel 
                           </button>
                        </div>


                    </form>


                </div>
            </div>
       
</div>
@endsection
