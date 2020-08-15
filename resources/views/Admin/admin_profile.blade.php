@extends('layouts.admin_layout')
@section('content')
<div class="col-md-2"></div>
<div class="col-md-5">
 
     @if (session('oldpassword'))
     <div class="alert alert-danger"><p>{{session('oldpassword')}}</p></div>
            
        @endif
        @if (session('password'))
     <div class="alert alert-danger"><p>{{session('password')}}</p></div>
            
        @endif
       
           @if (session('success'))
        <div class="alert alert-success"><p>{{session('success')}}</p></div>
        @error('old_password')
        <div class="alert alert-danger">{{$message}}</div>
             @enderror
             @error('new_password')
        <div class="alert alert-danger">{{$message}}</div>
             @enderror
             @error('comfirm_password')
        <div class="alert alert-danger">{{$message}}</div>
             @enderror
           @endif
  @if (session('edit'))
<div class="alert alert-success">{{session('edit')}}</div>
  @endif
<form action="{{route('update_admin')}}" method="post">
  @csrf
<input type="hidden" value="{{$data->id}}" name='id'>

    <div class="form-group">
    <label for="pwd">name</label>
        <input type="name" class="form-control" id="pwd" name="name" value={{$data->name}}>
      </div>
    <div class="form-group">
      <label for="usr">email</label>
    <input type="email" class="form-control" id="usr" name="email" placeholder="email" value="{{$data->email}}">
    </div>
    
    <a href="" class="btn btn-link " data-toggle="modal" data-target="#mypassword">change passsword</a>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>


  <div class="modal" id="mypassword">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create News</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        <form action="{{url('update_admin_password')}}" method="POST">
          @csrf
            <div class="form-group">
                <label for="pwd">old password</label>
                  <input type="text" class="form-control" id="pwd" name="old_password" placeholder="old password">
                </div>
              <div class="form-group">
                <label for="usr">New password</label>
                <input type="text" class="form-control" id="usr" name="new_password" placeholder="new password">
              </div>
              
              <div class="form-group">
                <label for="usr">Comfrim password</label>
                  <input type="text" class="form-control" id="usr" name="comfirm_password" placeholder="comfrim password">
                </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
  


@endsection