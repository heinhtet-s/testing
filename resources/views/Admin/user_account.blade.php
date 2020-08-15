@extends('layouts.admin_layout')
@section('content')
<div class="col-md-2"></div>
<div class="col-md-6">
<table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>email</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>
            <button class="btn btn-success">update</button>
            <button class="btn btn-warning">Delete</button>
        </td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>
            <button class="btn btn-success">update</button>
            <button class="btn btn-warning">Delete</button>
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection