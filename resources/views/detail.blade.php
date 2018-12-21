@extends('layouts.app')
@section('content')
        <h2>User {!! $user->name !!}</h2>
        <form method="post" action="/users/{!! $user->id !!}">
            {!! csrf_field() !!}

            <input type="hidden" name="_method" value="DELETE">
            <div class="form-group" >
                    <label for="name">Name</label>
                    {!!$user->name!!}
                  </div>
            <div class="form-group">
              <label for="email">Email </label>
              {!!$user->email!!}
            </div>

           
            
            <button type="submit" class="btn btn-danger">Delete</button>
            <button type="submit" class="btn btn-default">Cancel</button>
          </form>
          @endsection 