<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumsController extends Controller
{
    /**
     * Create a new controller instance.
     * Authorization, except for index & show pages
     * @return void
     */
      public function __construct(){
          $this->middleware('auth')->except(['index', 'show']);
      }
      // Index pages displays all albums
      public function index() {
          $albums = Album::with('Photos')->get();
          return view('albums.index')->with('albums', $albums);
      }
      // Show page displays one album's photos
      public function show($id) {
          $album = Album::find($id);
          return view('albums.show')->with('album', $album);
      }
      // Page to create an album (authorization required)
      public function create() {
          return view('albums.create');
      }
      // Store function stores a new album
      public function store(Request $request) {
          $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'cover_picture' => 'required|image|max:1999'
            ]);

          /* GET COVER PICTURE */
          //Get full file
          $fileNameWithExt = $request->file('cover_picture')->getClientOriginalName();
          // Get file name
          $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
          //Get file extension
          $fileExt = $request->file('cover_picture')->getClientOriginalExtension();
          // Compose final file
          $fileToUpload = $fileName . '_' . time() . '.' . $fileExt;
          // Upload image
          $path = $request->file('cover_picture')->storeAs('public/album_covers', $fileToUpload);

          /* MAKE NEW ALBUM */
          $album = new Album;
          $album->title = $request->input('title');
          $album->description = $request->input('description');
          $album->cover_picture = $fileToUpload;
          $album->user_id = auth()->user()->id;
          $album->save();

          return redirect('/')->with('success', 'Album Created');
        }
}
