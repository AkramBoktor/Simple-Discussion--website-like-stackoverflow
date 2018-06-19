@extends('layouts.app')

@section('content')

<div class="container">

            <div class="card">
                <div class="card-header">Update Reply</div>

                <div class="card-body">
                  
                 <form method="post" action="{{route('reply.update',['id'=>$reply->id])}}">

                        {{ csrf_field() }}

                          
              
                         <div class="form-group">
                            <label for="content">Answer Question</label>
                            <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{$reply->content}}
                                
                            </textarea> 
                        </div>

                         <div class="form-group text-center">
                            
                            <button type="submit" class="btn btn-success">
                              Update Reply 
                           </button>
                        </div>


                    </form>

              </div>
        </div>

</div>
@endsection
