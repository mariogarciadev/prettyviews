@extends('layouts.app')

@section('content')
  <div class="lead p-3 text-white">
  <h1 style="font-family: 'Graduate', cursive">Create Album</h1>
  <hr>
  {!! Form::open(['action' => 'AlbumsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
      <div class="form-group">
          {{Form::label('title', 'Album Name')}}
          {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Name...'])}}
      </div>
      <div class="form-group">
              {{Form::label('description', 'Description')}}
              {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description...'])}}
      </div>

      <div class="custom-file">
          <input name="cover_picture" class="custom-file-input" type="file">
          <label class="custom-file-label" for="cover_picture">Choose file</label>
      </div><br><br>

      {{Form::submit('Create', ['class' => 'btn btn-success', 'style' => 'font-family: "Graduate", cursive'])}}
      <a class="btn btn-secondary float-right" style="font-family: 'Graduate', cursive" href="/albums">Back to Gallery</a>
  {!! Form::close() !!}
</div>
@endsection
