@extends('layout')

@section('content')
  <h2>Selling You Home?</h2>

  <form method="post" action="/flyers" enctype="multipart/form-data">
    @include('flyers.form');
  </form>
@endsection