@extends('layouts.blog_layout')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-5"><img src="{{asset('/storage/photo/'.$data->new_image)}}" alt="" style="width:100%; height:100%;"></div>
    <div class="col-md-5">
      @error('Title')
          <div class="alert alert-danger">{{$message}}</div>
            @enderror
            @error('Photo')
          <div class="alert alert-danger">{{$message}}</div>
            @enderror
            @error('Content')
          <div class="alert alert-danger">{{$message}}</div>
            @enderror
    <h1>{{$data->new_title}}</h1>
    <p class="text-info"> Posted by {{$data->user->name}}</br>
    <small class="text-info"> {{$data->created_at->diffForHumans()}}</small></p>
    <hr>
    <p style="font-size: 17px;">{{$data->new_post}}</p>
    
    </div>
    <div class="col-md-1">
      <a href="" class="btn btn-outline-danger mb-3" style="width: 110%;" data-toggle="modal" data-target="#myedit">edit</a>
        <a href="" class="btn btn-outline-danger mb-3" style="width: 110%;" data-toggle="modal" data-target="#mydelete">delete</a>
    <a href="{{route('homes')}}" class="btn btn-outline-dark mb-3" style="width: 110%;">back</a>
    </div>
</div>
</div>
{{-- delete button --}}
<div class="modal" id="mydelete"  >
    <div class="modal-dialog" style="width: 250px; margin: 0 auto; padding:0 auto;">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Are you sure for delete ?</h4>
          
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <a href="{{url('/delete_new/'.$data->id)}}"><button class="btn btn-primary">yes</button> </a>
         <button class="btn btn-success"  data-dismiss="modal" >no</button>  
        </div>
      </div>
    </div></div>

        {{-- Edit button --}}
        
          

      <div class="modal" id="myedit">
    <div class="modal-dialog" >
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
         
          <img   class="modal-title" src="{{asset('/storage/photo/'.$data->new_image)}}" alt="" style="width:100%; height:100%;">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form action="{{url('/update_new')}}" method="post" enctype="multipart/form-data">
      @csrf
          <input type="hidden" value="{{$data->id}}" name="id">
            <div class="form-group">
                <label for="pwd">title</label>
            <input type="text" class="form-control" id="pwd" name="Title" value="{{$data->new_title}}" >
                </div>
              <div class="form-group">
                <label for="usr">image</label>
              <input type="file" class="form-control" id="usr" name="Photo" value="{{$data->new_image}}"  >
              </div>
              
              <div class="form-group">
                <label for="usr">Content</label>
              <input type="text" class="form-control" id="usr" name="Content" value="{{$data->new_post}}">
                </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
      </div>
    </div>
  </div>

        
        <!-- Modal footer -->
        
  

      
        

@endsection