@extends('layouts.blog_layout')
@section('content')

   <h1>User Profile</h1>
   <hr>
   @if (session('data'))
<div class="alert alert-warning"><p>{{session('data')}}</p></div>
       
   @endif
   @if (session('oldpassword'))
   <div class="alert alert-danger"><p>{{session('oldpassword')}}</p></div>
          
      @endif
      @if (session('password'))
   <div class="alert alert-danger"><p>{{session('password')}}</p></div>
          
      @endif
      @if (session('comfirm_password'))
      <div class="alert alert-danger"><p>{{session('comfirm_password')}}</p></div>
             
         @endif
         @if (session('success'))
      <div class="alert alert-success"><p>{{session('success')}}</p></div>
             
         @endif
     @error('old_password')
<div class="alert alert-danger">{{$message}}</div>
     @enderror
     @error('new_password')
<div class="alert alert-danger">{{$message}}</div>
     @enderror
     @error('comfirm_password')
<div class="alert alert-danger">{{$message}}</div>
     @enderror

   <div class="container-fulid">
   <div class="row">
    <div class="col-md-6">
    <form action="{{url('/update_account')}}" method="POST">
      @csrf
<input type="hidden" value={{$data->id}} name="id">
    <div class="form-group">
    <label for="pwd" >name</label>
        <input type="name" class="form-control" id="pwd" name="name"value={{$data->name}}>
      </div>
      @error('name')
  <div class="alert alert-danger">{{$message}}</div>
    @enderror

    <div class="form-group">
      <label for="usr">email</label>
      <input type="email" class="form-control" id="usr" name="email" value={{$data->email}}>
    </div>
    @error('email')
  <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <a href="" class="btn btn-link " data-toggle="modal" data-target="#mypassword">change passsword</a>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<div class="col-md-5">
  @error('Title')
  <div class="alert alert-danger">{{$message}}</div>
    @enderror
    @error('Photo')
    <div class="alert alert-danger">{{$message}}</div>
      @enderror
      @error('Contact')
  <div class="alert alert-danger">{{$message}}</div>
    @enderror
  <div class="offset-md-8">
    <div class="container">
     
        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
          Add new
        </button>
      
        <!-- The Modal -->
        <div class="modal" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">
            
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Create News</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              
              <!-- Modal body -->
              <div class="modal-body">
              <form action="{{url('/insert-new')}}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                     
                        <input type="text" class="form-control" id="pwd" name="Title" placeholder="Title">
                      </div>
                    <div class="form-group">
                      <label for="usr">image</label>
                      <input type="file" class="form-control" id="usr" name="Photo" placeholder="Photo">
                    </div>
                    
                    <div class="form-group">
                      
                        <input type="text" class="form-control" id="usr" name="Contact" placeholder="Contact">
                      </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
              </div>
              
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
              
            </div>
          </div>
        </div>
        
      </div>
</div>
</div>
</div>
</div>
{{-- for passsword --}}
<!-- Button to Open the Modal -->


  <!-- The Modal -->
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
        <form action="{{url('/user_change_password')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="pwd">old password</label>
                  <input type="password" class="form-control" id="pwd" name="old_password" placeholder="old password">
                </div>
              <div class="form-group">
                <label for="usr">New password</label>
                <input type="password" class="form-control" id="usr" name="new_password" placeholder="new password">
              </div>
              
              <div class="form-group">
                <label for="usr">Comfrim password</label>
                  <input type="password" class="form-control" id="usr" name="comfirm_password" placeholder="comfrim password">
                </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
  








@endsection
