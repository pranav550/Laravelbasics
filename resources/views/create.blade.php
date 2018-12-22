@extends('layouts.app')
@section('content')

@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
        <li>{!! $error !!}</li>
    @endforeach
  </ul>
</div>
@endif
        <h2>Add New User</h2>
        <form method="post" action="/users" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="form-group" >
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{!! old('name') !!}">
                  </div>
            <div class="form-group">
              <label for="email">Email </label>
              <input type="email" class="form-control" id="email" name="email" value="{!! old('email') !!}">
            </div>

            <div class="form-group">
                    <label for="password">Password </label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>

            <div class="form-group">
            <label for="password">Image </label>
            <input type="file" class="form-control" id="photo" name="photo">
            </div>      
            
            
            <button type="submit" class="btn btn-default">Save</button>
          </form>
          @endsection 