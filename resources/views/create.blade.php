@extends('layouts.app')
@section('content')
        <h2>Add New User</h2>
        <form method="post" action="/users">
            {!! csrf_field() !!}
            <div class="form-group" >
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                  </div>
            <div class="form-group">
              <label for="email">Email </label>
              <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                    <label for="password">Password </label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>
            
            
            <button type="submit" class="btn btn-default">Save</button>
          </form>
          @endsection 