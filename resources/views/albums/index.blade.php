@extends('layouts.app')

@section('content')

@if(count($albums) > 0)
<?php
 $i = 1;
 $classes = ['bg-primary', 'bg-success', 'bg-warning', 'bg-danger'];
 $pos = 0;
?>

  @foreach($albums as $album)
  <div style="border: 1px solid black" class="card text-center <?php echo ($classes[$pos]=='bg-warning') ?  'text-dark': 'text-white' ;?> w-75 mx-auto album <?php echo $classes[$pos]; ?>">
     <div class="card-header">
       <h1 class="card-title text-left display-3" ><?php echo " #" . $i . " "; ?>{{$album->title}}</h1>
     </div>
     <img class="card-img-top" src="/storage/album_covers/{{$album->cover_picture}}" alt="">
     <div class="card-body">
         <h2>{{$album->description}}</h2>
         <a style="font-family: 'Graduate', cursive" class="btn btn-dark btn-lg text-white" href="/albums/{{$album->id}}">See Photos</a>
     </div>
 </div>
 <br><br>
 <?php
    $i++;
    if($pos == 3){
      $pos = 0;
    } else {
      $pos++;
    }
?>

 @endforeach
  @else
    <h1 class="display-1">No Albums To Display</h1>
  @endif

@endsection
