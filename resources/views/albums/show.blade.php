@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="display-1 text-white">Album: {{$album->title}}</h1>
        <div class="btn btn-group">
            <a class="btn btn-secondary" style="font-family: 'Graduate', cursive" href="/albums">Go To Album Gallery</a>

            <!-- If client NOT a GUEST -->
            @if(!Auth::guest())
                <!-- DASHBOARD link -->
                <a class="btn btn-primary" style="font-family: 'Graduate', cursive" href="/home">Go To Dashboard</a>
                <!-- If client is album creator -->
                @if(Auth::user()->id == $album->user_id)
                    <!-- UPLOAD to self album link -->
                    <a class="btn btn-success" style="font-family: 'Graduate', cursive" href="/photos/create/{{$album->id}}">Upload Photo To Album</a>
                @endif
            @endif
        </div>

        <br><br>

        @if(count($album->photos) > 0)
            <?php
            $i = 1;
              $classes = ['bg-primary', 'bg-success', 'bg-warning', 'bg-danger'];
            $pos = 0;
            ?>
            <div class="card-columns">
                @foreach($album->photos as $photo)
                <div style="border: 2px solid black" class="card <?php echo ($classes[$pos]=='bg-warning') ?  $classes[$pos].' text-dark' : $classes[$pos]. ' text-white';?>">
                <img class="card-img-top img-fluid" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
                <div class="card-body">
                    <h1 class="card-title">{{$photo->title}}</h1>
                    <p class="card-text lead">{{$photo->description}}</p>
                    <a style="font-family: 'Graduate', cursive" class="btn btn-light btn-sm" href="/photos/{{$photo->id}}">See Full Size</a>
                </div>
            </div>
            <?php
                $i++;
                if($pos == 3){
                    $pos = 0;
                } else {
                    $pos++;
                }
            ?>
                @endforeach
            </div>
      @else
          <h1 style="font-family: 'Graduate', cursive">No Photos To Display</h1>
      @endif
    </div>
@endsection
