@extends('layouts.admin_layout')
@section('content')
<div class="col-md-2"></div>
<div class="col-md-6">
  @if(session("data"))
<div class="alert alert-info">{{session('data')}}</div>
@endif
@if(session('edit'))
<div class="alert alert-info">{{session('edit')}}</div>
@endif
<table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Admin</th>
        <th>premium user</th>

        <th></th>
      </tr>
    </thead>
    <tbody>

      @foreach ($data as $item)
      <tr>
      <td>{{$item->name}}</td>
      <td>{{$item->email}}</td>
      <td>{{$item->isAdmin}}</td>

      <td>{{$item->isPremium}}</td>
        <td>
          <a href="{{url('update_user_info/'.$item->id)}}"><button class="btn btn-success">update</button></a>
        <a href="{{url('delete_user_info/'.$item->id)}}"><button class="btn btn-warning">Delete</button></a>
          </td>
        </tr> 
      @endforeach
     
        
     
    </tbody>
  </table>
@endsection