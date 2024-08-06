<?php

namespace App\Http\Controllers\old;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class AboutFc extends Controller
{
  public function index(Request $request)
  {
    $team = Team::all();
    $data = compact('team');
    return view('old.about-us')->with($data);
  }
}
