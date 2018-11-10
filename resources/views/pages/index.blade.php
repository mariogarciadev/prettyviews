@extends('layouts.app')

@section('content')

<?php 
    use App\User;
    use App\Album;
    use App\Photo;

    $users = User::get();
    $albums = Album::get();
    $photos = Photo::get();

    $uCount = count($users);
    $aCount = count($albums);
    $pCount = count($photos);
?>

  <header class="mb-3">
    <div class="row no-gutters bg-light">

      <div class="col-lg-8 col-md-9 bg-dark p-4 text-white">
        <h1 class="display-2">PrettyViews</h1>
        <h3 class="text-black" style="font-family: 'Nunito', sans-serif">Welcome, in this application you will be able to make an album and upload photos in it. The albums can have descriptions about them and the photos as well. Specs for the photos can be viewed.</h3>
        <p class="lead" style="font-family: 'Nunito', sans-serif">Here are the latest albums uploaded by registered users:</p>

        <div class="d-flex justify-content-around align-items-stretch text-center" style="font-family: 'Nunito', sans-serif">
            <div class="p-2 bg-primary">
                <a href="/albums/{{$albumArray[0]->id}}">
                    <img src="/storage/album_covers/{{$albumArray[0]->cover_picture}}" class="img-fluid">
                    <p class="lead" style="color: yellow">{{$albumArray[0]->title}}" made by {{$albumArray[0]->user->name}}</p>
                </a>
            </div>
          </a>
            <div class="p-2 bg-primary">
                <a href="/albums/{{$albumArray[1]->id}}">
                    <img src="/storage/album_covers/{{$albumArray[1]->cover_picture}}" class="img-fluid">
                <p class="lead" style="color: yellow">"{{$albumArray[1]->title}}" made by {{$albumArray[1]->user->name}}</p>
            </div>
            <div class="p-2 bg-primary">
                <a href="/albums/{{$albumArray[2]->id}}">
                    <img src="/storage/album_covers/{{$albumArray[2]->cover_picture}}" class="img-fluid">
                <p class="lead" style="color: yellow">"{{$albumArray[2]->title}}" made by {{$albumArray[2]->user->name}}</p>
            </div>
            <div class="p-2 bg-primary">
                <a href="/albums/{{$albumArray[3]->id}}">
                    <img src="/storage/album_covers/{{$albumArray[3]->cover_picture}}" class="img-fluid">
                <p class="lead" style="color: yellow">"{{$albumArray[3]->title}}" made by {{$albumArray[3]->user->name}}</p>
            </div>
        </div>
        <a href="/albums" class="btn btn-danger btn-block btn-lg text-white mt-3" style="font-family: 'Graduate', cursive">All Albums</a>
      </div>

      <div class="col-lg-4 col-md-3 bg-primary p-4 text-white" style="font-family: 'Graduate', cursive; font-size: 1.1rem">
          <div class="d-flex flex-column text-white">
              <div class="bg-dark px-2 py-5]">
                  <h2>Website Stats:</h2>
              </div>
              <div class="bg-secondary p-2">
                  <p class="lead">Total Registered Users: <span style="color: yellow">{{$uCount}}</span></p>  
              </div>
              <div class="bg-dark p-2">
                  <p class="lead">Total Albums: <span style="color: yellow">{{$aCount}}<span></p>  
              </div>
              <div class="bg-secondary p-2">
                  <p class="lead">Total Photos: <span style="color: yellow">{{$pCount}}</span></p>  
              </div>
          </div>
      </div>

    </div>
  </header>

  <div class="row no-gutters bg-light" style="font-family: 'Graduate', cursive">
      <div class="col-lg-5 col-md-6 p-3" style="background: orange; color: indigo">
          <h1>About:</h1><br>
          <p class="lead">Created by Mario on 10/14/2018, this gallery site was built upon Laravel as the back-end framework, with vanilla PHP here and there for various display patterns.</p><br>

          <p class="lead">For most of the front end, HTML, some CSS styling, and Bootstrap for the most part took care of the visuals.</p><br>

          <p class="lead">This project demonstrates ability of managing the front-end, understanding of PHP, knowledge of CRUD functionality, confidence in working with the database, incentiveness of Bootstrap classes, an eye of UI.</p><br>
      </div>
      <div class="col-lg-4 col-md-3 p-3" style="background: indigo; color: orange">
          <h1>What You Can Do:</h1>
          <ul class="list-group" style="color: indigo">
              <li class="list-group-item">Make albums, upload photos (with registering of course).</li>
              <li class="list-group-item">Add captions to the pictures... let other users see!</li>
              <li class="list-group-item">View other users' pictures, descriptions, and the specs.</li>
              <li class="list-group-item">Be alerted if you're unauthorized and try to update and album's contents.</li>
          </ul>
      </div>
      <div class="col-lg-3 col-md-3 p-3" style="background: orange; color: indigo">
          <h1>Details Summary:</h1>
          <p class="lead">Front-end Tools: HTML, CSS, Bootstrap.</p>
          <p class="lead">Back-end Tools: PHP, Laravel, MYSQL.</p>
          <p class="lead">Time to Make: 6 Days.</p>   
      </div>

  </div>
@endsection
