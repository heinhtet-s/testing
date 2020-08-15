@extends('layouts.blog_layout')

@section('content')
<div class="jumbotron text-center">
  
      <h1 >Home</h1>
     
    </div>
    <div class="container">
      @if (session('premium'))
      <div class="alert alert-danger">{{session('premium')}}</div>
            
        @endif
      
      @if (session('delete'))
    <div class="alert alert-success">{{session('delete')}}</div>
          
      @endif
      @if(session('admin'))
    <div class="alert alert-danger">{{session('admin')}}</div>
    @endif
        <div class="row">
          @foreach ($data as $data)
          <div class="col-sm-4">
            <img src="{{asset('storage/photo/'.$data->new_image)}}" 
          class="ima-fluid" style="height:100%; width:100%;"
          alt="">
            <h3>{{$data->new_title}}</h3>
          
          <a href="{{url('look_new_info/'.$data->id)}}"><button class="btn btn-info">See more</button></a>
            </div>
          @endforeach
         
          </div>
          
        </div>

  
@endsection