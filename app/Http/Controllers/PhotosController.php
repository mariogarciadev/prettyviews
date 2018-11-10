<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Photo;
use App\Album;

class PhotosController extends Controller
{
    /**
     * Create a new controller instance.
     * Authorization, except for show page
     * @return void
     */
      public function __construct(){
          $this->middleware('auth')->except(['show']);
      }
      // Show page displays a photo
      public function show($id) {
          $photo = Photo::find($id);
          return view('photos.show')->with('photo', $photo);
      }
      // Page to upload a photo (authorization & parent album_id required)
      public function create($album_id) {
          // Find album with the id passed
          $album = Album::find($album_id);
          // If logged in user id matches user_id of album
          if(auth()->user()->id != $album->user_id) {
              return redirect('/albums/'.$album_id)->with("error", "You\'re Unauthorized to Upload Photo to this Album");
          }
          return view('photos.create')->with('album_id', $album_id);
      }
      // Store function stores new photo and its name
      public function store(Request $request) {
        // Validates inputs as required
          $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'photo' => 'required|image|max:1999|'
          ]);

          /* GET PHOTO */
          //Get full file
          $fileNameWithExt = $request->file('photo')->getClientOriginalName();
          // Get file name
          $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
          //Get file extension
          $fileExt = $request->file('photo')->getClientOriginalExtension();
          // Compose final file
          $fileToUpload = $fileName . '_' . time() . '.' . $fileExt;
          // Upload image
          $path = $request->file('photo')->storeAs('public/photos/'.$request->input('album_id'), $fileToUpload);

          /* MAKE NEW ALBUM */
          $photo = new Photo;
          $photo->album_id = $request->input('album_id');
          $photo->title = $request->input('title');
          $photo->description = $request->input('description');
          $photo->size = $request->file('photo')->getClientSize();
          $photo->photo = $fileToUpload;
          $photo->save();

          return redirect('/albums/'.$request->input('album_id'))->with('success', 'Photo Uploaded');
      }

      public function destroy($id) {
        $photo = Photo::find($id);
        if(auth()->user()->id != $photo->user_id){
            return redirect('/albums/'.$photo->album_id)->with("error", "You\'re Unauthorized to Delete The Photo");
        }
        if(Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)) {
          $photo->delete();
          return redirect('/albums/'.$photo->album_id)->with('success', 'Photo Deleted');
        }
      }
}
