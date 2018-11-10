@extends('layouts.app')

@section('content')
<?php
    use App\Album;
    $temp = Album::find($album_id);
    $picName = $temp->cover_picture;
?>

<div style="background: url('/storage/album_covers/<?php echo $picName; ?>') no-repeat; background-size: cover; border: 3px solid black"
  class="py-3">
  <div class="bg-secondary p-3 text-white w-50 mx-auto lead" style="border: 3px solid black; border-radius: 10px">
    <h1 style="font-family: 'Graduate', cursive">Upload a Photo</h1>

    {!! Form::open(['action' => 'PhotosController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
      <div class="form-group">
          {{Form::label('title', 'Photo Title')}}
          {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title...'])}}
      </div>

      <div class="form-group">
          {{Form::label('description', 'Description')}}
          {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description...'])}}
      </div>

      {{Form::hidden('album_id', $album_id)}}

      <div class="custom-file">
          <input name="photo" class="custom-file-input" type="file">
          <label class="custom-file-label" for="photo">Choose file</label>
      </div><br><br>

      {{Form::submit('Upload', ['class' => 'btn btn-success', 'style' => 'font-family: "Graduate", cursive'])}}
      <a class="btn btn-primary float-right" style="font-family: 'Graduate', cursive" href="/albums/<?php echo $album_id;?>" >Back to Album</a>
  {!! Form::close() !!}
  </div>
<div>
@endsection
