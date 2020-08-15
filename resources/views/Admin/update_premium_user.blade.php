@extends('layouts.admin_layout')
@section('content')
<div class="col-md-4 offset-md-2">
    @if(session('validate'))
<div class="alert alert-danger">{{session('validate')}}</div>
    @endif
<form action="{{url('update_premium_user ')}}" method="post">
    @csrf
<input type="hidden" value="{{$data->id}}" name="id">
            <div class="form-group">

                <label for="pwd">name</label>
            <input type="text" class="form-control" id="pwd" name="name" value="{{$data->name}}" >
            @error('name')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
                </div>
                <div class="form-group">

                    <label for="pwd">email</label>
                <input type="email" class="form-control" id="pwd" name="email" value="{{$data->email}}" >
                @error('email')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
                    </div>
              <div class="form-group">
                <label for="usr">isAdmin</label>
              <input type="text" class="form-control" id="usr" name="isAdmin" value="{{$data->isAdmin}}"  >
              @error('isAdmin')
              <div class="alert alert-danger">{{$message}}</div>
              @enderror
              </div>
              
              <div class="form-group">

                <label for="usr">isPremium</label>
              <input type="text" class="form-control" id="usr" name="isPremium" value="{{$data->isPremium}}">
              @error('isPremium')
              <div class="alert alert-danger">{{$message}}</div>
              @enderror
                </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
@endsection