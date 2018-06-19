@extends('layouts.app')

@section('content')

<div class="container">

            <div class="card">
                <div class="card-header">Update Discussion</div>

                <div class="card-body">
                  
                 <form method="post" action="{{route('discussion.update',['id'=>$discussion->id])}}">

                        {{ csrf_field() }}

                          
              
                         <div class="form-group">
                            <label for="content">Ask Question</label>
                            <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{$discussion->content}}
                                
                            </textarea> 
                        </div>

                         <div class="form-group text-center">
                            
                            <button type="submit" class="btn btn-success">
                              Update Discussion
                           </button>
                        </div>


                    </form>

              </div>
        </div>

</div>
@endsection
