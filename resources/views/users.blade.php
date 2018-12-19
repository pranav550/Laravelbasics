
@extends('layouts.app')

@section('content')

@if(Session::has('message'))
<div class="alert alert-success">{!! Session::get('message') !!}</div>
@endif
<h1>User Listing</h1>
<a href="/users/create" class="btn btn-success pull-right">Add New User</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>
     <tbody>
         @foreach($users as $user)
         <tr>
             <td>{!! $user->id !!}</td>
             <td>{!! $user->name !!}</td>
             <td>{!! $user->email !!}</td>
         </tr>
         @endforeach
     </tbody>
</table>
@endsection

















