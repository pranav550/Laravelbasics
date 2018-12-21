@extends('layouts.app')
@section('content')
        <h2>Edit User</h2>
        <form method="post" action="/users/{!! $user->id !!}">
            {!! csrf_field() !!}

            <input type="hidden" name="_method" value="PUT">
            <div class="form-group" >
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{!!$user->name!!}">
                  </div>
            <div class="form-group">
              <label for="email">Email </label>
              <input type="email" class="form-control" id="email" name="email" value="{!!$user->email!!}">
            </div>

            <div class="form-group">
                    <label for="password">Password </label>
                    <input type="password" class="form-control" id="password" name="password" value="{!!$user->password!!}">
                  </div>
            
            
            <button type="submit" class="btn btn-default">Edit</button>
          </form>
          @endsection 