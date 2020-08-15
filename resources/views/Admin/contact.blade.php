@extends('layouts.admin_layout')
@section('content')
<div class="col-md-2"></div>
<div class="col-md-6">
<table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Message</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
          
      
      <tr>
      <td>{{$item->name}}</td>
      <td>{{$item->email}}</td>
      <td>{{$item->message}}</td>
        <td>
            <button class="btn btn-success">update</button>
        <a href="{{url('contact_delete/'.$item->id)}}"> <button class="btn btn-warning">Delete</button></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection