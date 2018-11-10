@extends('layouts.app')

@section('content')

    <?php 
        $totalPhotos = 0;
        foreach($albums as $album){
            $numPhotos = count($album->photos);
            $totalPhotos += $numPhotos;
        }
    ?>
    <h1 class="display-2 text-center text-white">{{auth()->user()->name}}'s Dashboard</h1>

    
    <table class="table table-bordered bg-white w-50 mx-auto" style="font-family: 'Graduate', cursive">
        <tbody>
            <tr>
                <th scope="row">Number of Albums:</th>
                <td>{{count($albums)}}</td>
            </tr>

            <tr>
                <th scope="row">Total Number of Photos:</th>
                <td>{{$totalPhotos}}</td>
            </tr>
        </tbody>
    </table>

    <h1 class="text-center text-white" style="font-family: 'Graduate', cursive">These are your personal albums by you.</h1>

    @if(count($albums) > 0)
        <div class="card-columns">
            @foreach($albums as $album)
                <div style="border: 2px solid black" class="card">
                    <img class="card-img-top img-fluid" src="/storage/album_covers/{{$album->cover_picture}}" alt="{{$album->title}}">
                    <div class="card-body">
                        <h1 class="card-title">{{$album->title}}</h1>
                        <p class="card-text lead">{{$album->description}}</p>
                        <a style="font-family: 'Graduate', cursive" class="btn btn-success btn-sm" href="/albums/{{$album->id}}">Check out Pics</a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <h1 style="font-family: 'Graduate', cursive">You Don't have any Albums.</h1>
    @endif
@endsection
