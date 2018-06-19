@extends('layouts.app')

@section('content')
<div class="container">

            <div class="card">
                <div class="card-header">Channels</div>

                <div class="card-body">
                  


                         <table class="table table-hover">
                             <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                              </thead>
                              <tbody>

                                <tr>
                                 @foreach($channels as $channel)

                                   <td>{{$channel->id}}</td>
                                   <td>{{$channel->title}}</td>
                                   <td>
                                        <a href="{{route('channels.edit',['channel' =>$channel->id])}}">
                                        <button class="btn btn-primary">Edit</button></a>
                                   </td>
                                    <td>
                                         <form method="post" 
                                             action="{{route('channels.destroy',['channel'=>$channel->id])}}">

                                                 {{ csrf_field() }}
                                                 {{ method_field('DELETE') }}
                                            <button class="btn btn-danger" type="submit">Destroy</button></a>
                                    </form>
                                   </td>
                                </tr>
                                @endforeach
                              </tbody>
                         </table>

    </div>
</div>
@endsection
