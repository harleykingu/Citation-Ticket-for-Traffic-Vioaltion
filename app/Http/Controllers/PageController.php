<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Violation;
use App\Jaywalking;
use Auth;

class PageController extends Controller
{

  public function index(Request $request)
  {
      $sTCT = $request->input('sTCT');
      $sDN = $request->input('sDN');


      $allViolation = Violation::orderBy('created_at','desc')
      ->search_tct($sTCT)
      ->search_dn($sDN)
      ->paginate(15);

      $allJaywalking = Jaywalking::orderBy('created_at','desc')->paginate(15);


      if(Auth::check()){
        return view('home')
        ->withViolations($allViolation)
        ->withJaywalkings($allJaywalking)
        ->withStct($sTCT)
        ->withSdn($sDN);
      }
      else {
        return redirect()->route('login');
      }
  }
}
