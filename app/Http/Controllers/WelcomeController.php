<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\df_inventories;
use DB;
use df_checkouts;

class WelcomeController extends Controller
{
    public function welcome(){
       $dfinvcart = DB::select('select * from df_inventories where df_cart = 1');
       $dfcartcounta = DB::table('df_checkouts')->count();
       $dfcartcountb = DB::table('df_checkins')->count();
       $dfcartcount = $dfcartcounta + $dfcartcountb;
      $price = [
        ['type' => 'banana', 'base' => 'ripe', 'price' => 10],
        ['type' => 'banana1', 'base' => 'ripe1', 'price' => 101],
        ['type' => 'banana2', 'base' => 'ripe2', 'price' => 102]
      ];
      $df_inv = df_inventories::all();
        return view('welcome',[
          'generalpoito' => $price,
          'getid' => request('ProductID'),
          'getname' => request('PName'),
          'df_inv' => $df_inv,
          'dfinvcart' => $dfinvcart,
          'dfcartcount' => $dfcartcount
          // same lang ng GET sa PHP yung Request
        ]);
    }

}
