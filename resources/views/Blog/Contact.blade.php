@extends('layouts.blog_layout')
@section('content')
<div class="row">
 <div class="col-md-7">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d488797.79018863157!2d95.90136421745792!3d16.8396098054255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1949e223e196b%3A0x56fbd271f8080bb4!2sYangon!5e0!3m2!1sen!2smm!4v1592552217680!5m2!1sen!2smm" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
<div class="col-md-4">
    
       @if (session('data'))
<div class="alert alert-success">{{session('data')}}</div>
           
       @endif
       
<form action="{{route('user_contact')}}" method="POST">
  @csrf

          <div class="form-group">
            @error('email')
          <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <input type="email" class="form-control"  name="email" placeholder="email">
          </div>
          <div class="form-group">
            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
              @enderror
            <input type="text" class="form-control"  name="name" placeholder="name">
          </div>
          <div class="form-group">
            @error('message')
          <div class="alert alert-danger">{{$message}}</div>
            @enderror
            <textarea name="message" cols="30" rows="10" class="form-control" placeholder="enter your message"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      
    </div>
</div>
@endsection