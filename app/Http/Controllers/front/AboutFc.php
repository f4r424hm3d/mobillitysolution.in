<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class AboutFc extends Controller
{
  public function index(Request $request)
  {
    $team = Team::all();
    $data = compact('team');
    return view('front.about')->with($data);
  }
  public function whatMakeUsDifferent(Request $request)
  {
    return view('front.what-make-us-different');
  }
}
