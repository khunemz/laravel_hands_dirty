@extends('layout')

@section('content')
  <h2>Selling You Home?</h2>
  <div class="row">
    <form method="post" action="/flyers" enctype="multipart/form-data" >
      @if(count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
      @include('flyers.form')
    </form>
  </div>
@endsection
