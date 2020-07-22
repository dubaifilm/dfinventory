<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dubaifilm;
class TeamController extends Controller
{
    public function profile($idsinglerecord){

      $showteam = dubaifilm::findOrfail($idsinglerecord);
      return view('team.profile', [
        'showteam' => $showteam,
        'id' => $idsinglerecord
      ]);
    }
}
