<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\df_inventories;
use App\df_checkouts;
use App\df_checkins;
use DB;

class DateController extends Controller
{
    //

    public function chart(){
  $df_inv = df_checkouts::all();
    $df_invin = df_checkins::all();
      $df_dis = DB::select('SELECT dfform,o_projname,o_projdate,o_name,o_companyid,created_at,o_subfile,o_projdura,dfstatus FROM df_checkouts GROUP BY dfform,o_projname,o_projdate,o_name,o_companyid,created_at,o_subfile,o_projdura,dfstatus HAVING COUNT(dfform)>=1;');
      $df_diss = DB::select('SELECT dfform,o_projname,o_projdate,o_name,o_companyid,o_subfile,o_projdura,dfstatus FROM df_checkins GROUP BY dfform,o_projname,o_projdate,o_name,o_companyid,o_subfile,o_projdura,dfstatus HAVING COUNT(dfform)>=1;');

      return view('chart.chart',['df_inv' => $df_inv,'df_invin' => $df_invin,'df_dis'=>$df_dis,'df_diss'=>$df_diss]);
    }
    public function editchart($id){
      $df_inv = df_checkouts::all();


      $df_infout = DB::select('select * from df_checkouts where dfform = ?',[$id]);
      foreach ($df_infout as $df_infoout) {

          DB::update('UPDATE df_inventories SET dfstatus = "Available" WHERE dfserial = ?',[$df_infoout->dfserial]);
          DB::update('UPDATE df_checkouts SET dfstatus = "Available" WHERE dfserial = ?',[$df_infoout->dfserial]);
      }


      return redirect('chart/chart');
    }
    public function editpostchart($id){
      $df_infout = DB::select('select * from df_checkouts where dfform = ?',[$id]);
      foreach ($df_infout as $df_infoout) {
        $dfser = request('df'.$df_infoout->dfserial);
        $dfrem = request('dfrem'.$df_infoout->dfserial);
        $user = df_inventories::where('dfserial', $dfser)->update(['dfremarks' => $dfrem,'dfstatus'=>"Available"]);
        $useraa = df_checkouts::where('dfserial', $dfser)->update(['dfremarks' => $dfrem,'dfstatus'=>"Available"]);
        $usera = DB::select('select * from df_checkouts where dfserial = ?',[$dfser]);

        foreach ($usera as $userasd) {
          $df_invvvv = new df_checkins();
          $df_invvvv->dfform = $userasd->dfform;
          $df_invvvv->dfserial = $userasd->dfserial;
          $df_invvvv->dfstatus   = $userasd->dfstatus;
          $df_invvvv->dfitem  = $userasd->dfitem;
           $df_invvvv->o_subfile = $userasd->o_subfile;
           $df_invvvv->o_subf = json_decode($userasd->o_subf);
          $df_invvvv->dfdescription = $userasd->dfdescription;
          $df_invvvv->dfremarks = $userasd->dfremarks;
          $df_invvvv->dfcategory = $userasd->dfcategory;
          $df_invvvv->dfstorage = $userasd->dfstorage;
          $df_invvvv->dfproductimg = $userasd->dfproductimg;
          $df_invvvv->o_name = $userasd->o_name;
          $df_invvvv->o_companyid = $userasd->o_companyid;
          $df_invvvv->o_projname = $userasd->o_projname;
          $df_invvvv->o_projdate = $userasd->o_projdate;
          $df_invvvv->o_projdura = $userasd->o_projdura;
          $df_invvvv->save();
        }

        DB::delete('delete from df_checkouts where dfserial = ?',[$dfser]);
      }
      return redirect('/df/admin/');
    }



}
