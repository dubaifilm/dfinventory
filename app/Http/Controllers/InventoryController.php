<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\df_inventories;
use File;
use App\df_checkouts;
use App\df_checkins;

use DB;

class InventoryController extends Controller
{
    public function add(){
      return view('inventory.add_inventory');
    }
    public function new_item(){
      $dfinv = new df_inventories();
      $dfinv->dfserial = request('dfserial');
      $dfinv->dfstatus = request('dfstatus');
      $dfinv->dfitem = request('dfitem');
      $dfinv->dfdescription = request('dfdescription');
      $dfinv->dfcategory = request('dfcategory');
      $dfstorage1 =  request('dfstorage1');
      $dfstorage2 =  request('dfstorage2');
      $dfstorage3 =  request('dfstorage3');
      $dfstorage4 =  $dfstorage1 ." ". $dfstorage2 ." ". $dfstorage3;
      $dfinv->dfstorage = $dfstorage4;
      $dfinv->dfproductimg = $_FILES["dfproductimg"]["name"]  ;
      $dfproductimg1 = "img/equipments/";

      $target_file2 = $dfproductimg1 . basename($_FILES["dfproductimg"]["name"]);
      $imageFileType = pathinfo($target_file2,PATHINFO_EXTENSION);
      if (move_uploaded_file($_FILES["dfproductimg"]["tmp_name"], $target_file2)) {
     }

      $dfinv->save();

      return redirect('inventory/add_inventory')->with('mssg','Created Sucessfully!');
    }
    public function edit($id){
      $editinv = df_inventories::findOrfail($id);
      return view('inventory.edit_inventory',['editinv'=>$editinv]);
    }
    public function edit_item($id){
      $dfinv = df_inventories::find($id);
      $dfinv->dfserial = request('dfserial');
      $dfinv->dfstatus = request('dfstatus');
      $dfinv->dfitem = request('dfitem');
      $dfinv->dfstorage =  request('dfstorage1') ." - ". request('dfstorage2') ." - ". request('dfstorage3');
      $dfinv->dfdescription = request('dfdescription');
      $dfinv->dfcategory = request('dfcategory');

      $dfinv->save();
      return redirect('/')->with('mssg','Updated Sucessfully!');
    }
    public function del_item($id){
     $dfinv =  DB::delete('delete from df_inventories where id = ?',[$id]);

      return redirect('/')->with('mssg','Deleted Sucessfully!');
    }
    public function add_cart($id){
     $dfinvupdate =  DB::update('update df_inventories set df_cart = 1, dfstatus = "Unavailable" where id = ?',[$id]);
      return redirect('/')->with('cart','List of items to Check out!');
    }
    public function remove_cart($id){
     $dfinvupdate =  DB::update('update df_inventories set df_cart = 0, dfstatus = "Available" where id = ?',[$id]);
      return redirect('/')->with('cart','List of items to Check out!');
    }
    public function out_cart(){
      $dfinvout = DB::select('select * from df_inventories where df_cart = 1');

      $dfcartcounta = DB::table('df_checkouts')->count();
      $dfcartcountb = DB::table('df_checkins')->count();

      $dfcartcount = $dfcartcounta + $dfcartcountb;
      foreach ($dfinvout as $dfinvo){
        $df_inv = new df_checkouts();
         $df_inv->dfserial = $dfinvo->dfserial;                         // $df_inv->dfserial = $dfinvo->dfserial;
         // $qty = request('dfstatusyy'.$dfinvo->id);
         $df_inv->dfstatus   = $dfinvo->dfstatus;
         $df_inv->dfitem  = $dfinvo->dfitem;
          $df_inv->o_subfile = serialize($_FILES["o_subfile"]["name"]);
         $df_inv->dfdescription = $dfinvo->dfdescription;
         $df_inv->dfcategory = $dfinvo->dfcategory;
         $df_inv->dfstorage = $dfinvo->dfstorage;
         $df_inv->dfproductimg = $dfinvo->dfproductimg;
         $df_inv->o_name = request('o_name');
         $df_inv->o_companyid = request('o_companyid');
         $df_inv->o_projname = request('o_projname');
         $df_inv->o_projdate = request('o_projdate');
         $df_inv->o_projdura = request('o_projdura');
         if(!request('o_subf')){}else {
           $df_inv->o_subf = (request('o_subf'));
         }
         $df_inv->dfform = 'DF00'.$dfcartcount;
         for( $i=0 ; $i < count($_FILES["o_subfile"]["name"]) ; $i++ ){
         $target_dir1 = "img/checkout/"."DF00".$dfcartcount."/";
         if(!file_exists($target_dir1)){
            mkdir($target_dir1);
         }
         $target_file1 = $target_dir1 . basename($_FILES["o_subfile"]["name"][$i]);
         $imageFileType = pathinfo($target_file1,PATHINFO_EXTENSION);
         if (move_uploaded_file($_FILES["o_subfile"]["tmp_name"][$i], $target_file1)) {
        }
        }
         $df_inv->save();


      }

      DB::update('update df_inventories set df_cart = 0');
      return redirect('/');
    }
}
