@extends('layout')

@section('content')
  <div class="row">
    <div class="col-md-3">
      <h2>{!! $flyer->street !!}</h2>
      <h2>{!! $flyer->price !!}</h2>
    </div>
    <div class="col-md-8 gallery">
      @foreach($flyer->photos->chunk(4) as $set)
        <div class="row">
          @foreach ($flyer->photos as $photo)
            <div class="col-md-3 gallery__image">
              <a href="/{{ $photo->path }}" data-litly></a>
              <img src="{{ url($photo->thumbnail_path) }}" class="img-responsive">
            </div>
          @endforeach
          
        </div>
      @endforeach
    </div>
  </div>


  <hr>
  
  <div class="description">
    {!! nl2br($flyer->description)!!}
  </div>
  <hr>

  @if($user && $user->owns($flyer))
  <h2>Add your photos</h2>

    <form id="addPhotosForm" 
      method="POST" 
      action="{{ route('store_photo_path', [$flyer->zip , $flyer->street]) }}" 
      class="form-group dropzone"
      >

     {{ csrf_field() }}
    </form>
  @endif
@stop

@section('scripts.footer')
  <script>
    Dropzone.options.addPhotosForm = {
      paramName: 'photo',
      maxFilezide: 3,
      acceptedFiles: '.jpg, .jpeg, .png , .bmp',
      maxfilesreached: 4
    };
  </script>
@stop

