@extends('layout')

@section('content')
<div class="modal-dialog">
  <div class="modal-content">
    <h1 class="modal-title" align="center">Login</h4>
    <hr/>
    <div class="modal-body">
      @include('errors')
      <form method="POST" action="{{ url('auth/login') }}" name="loginForm" id="loginForm" class="form-group">
        {!! csrf_field() !!}

        <div class="form-group">
          <label for="email">Email :</label>
          <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="email@example.com">
        </div>

        <div class="form-group">
          <label for="password">Password :</label>
          <input type="password" name="password" id="password" class="form-control" id="password" placeholder="Your password">
        </div>

        <div class="form-group">
          <input type="checkbox" name="remember"> Remember Me
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-default">Login</button>
        </div>
      </form>
  
    </div>

    <div class="modal-footer">
      <a href="{{ url('/auth/register') }}">Create a new account ?</a>
    </div>
  </div>
</div>
@endsection