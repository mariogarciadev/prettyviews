<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;
class PagesController extends Controller
{
    /*** Main site index, takes latest created 4 albums to display ***/
    public function index() {
      // Order albums with photos, and get them
      $albums = Album::with('Photos')->orderBy('created_at', 'desc')->get();
      // Initiate new array
      $albumArray;

      $i = 0;
      // For each album in albums
      foreach($albums as $album){
          // Push album into array
          $albumArray[] = $album;
          // If 4th index in array added, break
          if($i == 3) {
              break;
          }
          $i++;
      }
      // Get index page with albums array
      return view('pages.index')->with('albumArray', $albumArray);
    }
}
