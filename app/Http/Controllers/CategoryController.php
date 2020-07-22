<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dubaifilm;
use App\df_inventories;
use App\df_checkouts;
use App\df_checkins;
use DB;


class CategoryController extends Controller
{
    public function category($id){
      if($id == 'user'){
        $showteam = dubaifilm::all();

        $df_inv = df_checkins::all();
        $df_diss = DB::select('SELECT dfform,o_projname,o_projdate,o_name,o_companyid,o_subfile,o_projdura,dfstatus FROM df_checkins GROUP BY dfform,o_projname,o_projdate,o_name,o_companyid,o_subfile,o_projdura,dfstatus HAVING COUNT(dfform)>=1;');

        // $showteam = dubaifilm::orderBy('id','desc')->get();
        //$showteam = dubaifilm::latest()->get();
        // $showteam = dubaifilm::where('id','2')->get();
            return view('category.homeuser', ['showteam' => $showteam, 'df_inv' => $df_inv, 'df_dis' => $df_diss]);
      }
      elseif ($id == 'admin') {
          $df_inv = df_checkouts::all();
          $df_dis = DB::select('SELECT dfform,o_projname,o_projdate,o_name,o_companyid,created_at,o_subfile,o_projdura,dfstatus FROM df_checkouts GROUP BY dfform,o_projname,o_projdate,o_name,o_companyid,created_at,o_subfile,o_projdura,dfstatus HAVING COUNT(dfform)>=1;');
            return view('category.homeadmin',['df_inv' => $df_inv, 'df_dis' => $df_dis]);
      }

      elseif ($id == 'moderator') {
            return view('category.homemoderator');
      }
    }
    public function store(){
      $team = new dubaifilm();
      $team->name = request('name');
      $team->age = request('age');
      $team->position = request('position');
      $team->category = request('category');
      $team->save();
      return redirect('/df/user')->with('mssg','Created Sucessfully!');
    }
}
