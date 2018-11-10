@extends('layouts.app')

@section('content')
  <h1 class="display-1 text-white">{{$photo->title}}</h1>
  <a class="btn btn-warning" style="font-family: 'Graduate', cursive" href="/albums/{{$photo->album_id}}">Back To Gallery</a>
  <hr>
  <div class="card" style="background: transparent">
      <img style="border: 3px solid black" class="card-img" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}"><br><br>
        <?php
            use App\Album;
            use App\User;

            // Get: Photo's Album, then Album Title to display
            $album = Album::find($photo->album_id);
            $parentAlbum = $album->title;

            // Get: username for displaying photo uploader
            $id = $album->user_id;
            $user = User::find($id);
            $username = $user->name;
        ?>
      <table class="table table-sm table-dark" style="font-family: 'Graduate', cursive; font-size: 1.2rem; border: 2px solid black">
                <tbody>
                    <tr>
                        <th scope="row">Title:</th>
                        <td class="bg-danger text-white">{{$photo->title}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Description:</th>
                        <td class="text-dark" style="background: orange">{{$photo->description}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Album:</th>
                        <td class="bg-warning text-dark">{{$parentAlbum}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Creator:</th>
                        <td class="bg-success text-white">{{$username}}</td>
                        </tr>
                    <tr>
                        <th scope="row">Date Created:</th>
                        <td class="bg-primary text-white">{{$photo->created_at}}</td>
                    </tr>
                    <tr>
                        <th scope="row">File Name:</th>
                        <td style="background: indigo" class="text-white">{{$photo->photo}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Size:</th>
                        <td class="bg-secondary text-white">{{$photo->size}}</td>
                    </tr>
                </tbody>
        </table>
    
    @if(!Auth::guest())
        @if(Auth::user()->id == $album->user_id)
            {!!Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method' => 'POST'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete Photo', ['class' => 'btn btn-danger btn-block', 'style' => 'font-family: "Graduate", cursive'])}}
            {!!Form::close()!!}
        @endif
    @endif

  </div>
  <br>

@endsection
