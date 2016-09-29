@extends('layout')

@section('content')

<div class="modal-dialog">
  <div class="modal-content">
    <h1 class="modal-title" align="center">Register</h4>
    <hr/>
    <div class="modal-body">
      @include('errors')
      <form method="POST" action="{{ url('auth/register') }}" name="registerForm" id="registerForm" class="form-group">
        {!! csrf_field() !!}
        <div class="form-group">
          <label for="name">Name :</label>
          <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="John Doe">
        </div>

        <div class="form-group">
          <label for="email">Email :</label>
          <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="email@example.com">
        </div>

        <div class="form-group">
          <label for="password">Password :</label>
          <input type="password" name="password" id="password" class="form-control" id="password" placeholder="Your password">
        </div>

        <div class="form-group">
          <label for="password_confirmation">Confirm Password :</label>
          <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" id="password_confirmation" placeholder="Your password">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-default">Register</button>
        </div>
      </form>

    </div>

    <div class="modal-footer">
      <a href="{{ url('/auth/login')}}">Have an account ?</a>
    </div>
  </div>
</div>
@endsection