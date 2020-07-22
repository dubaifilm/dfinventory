@extends('layouts.layout')
@section('content')
<div id="mjbodytoggle" class="mj-body mj-border badge-dark">
                <div class="title m-b-md">
                CHECK OUT ITEMS

                </div>


                  <div class="container">
                <table id="example" class="table borderless dt-responsive" style="width:100%">
                      <thead>
                          <tr>

                              <th>Form ID</th>
                                <th>Project</th>
                                <th>Project Date</th>
                                <th>Project Until</th>
                                <th>Recipient</th>
                                <th  class="hidden">Company ID</th>
                                <th class="hidden">Checkout</th>
                                <th class="hidden">Equipment</th>


                                <th>Actions</th>
                          </tr>
                      </thead>
                      <tbody>

                        <?php foreach ($df_dis as $df_invi): ?>


                          @php
                          $df_item = DB::select('select * from df_checkouts where dfstatus = "Unavailable" AND dfform = ?',[$df_invi->dfform]);
                          @endphp
                            <tr>




                              <td>{{ $df_invi->dfform }}</td>
                              <td >{{ $df_invi->o_projname }}</td>
                              <td>{{ $df_invi->o_projdate }}</td>
                              <td>{{ $df_invi->o_projdura }}</td>
                              <td>{{ $df_invi->o_name }}</td>
                              <td  class="hidden">{{ $df_invi->o_companyid }}</td>
                              <td class="hidden">  <?php foreach ($df_item as $df_items): ?>{{$df_items->dfserial}} -  {{$df_items->dfitem}}<?php endforeach; ?></td>
                              <td  class="hidden">{{ $df_invi->created_at }}</td>
                              <td>
                                <a type="button" class="form-control btn btn-info btn-sm"  onclick="tog{{ $df_invi->dfform }}()"  title="Equipments"><i class="fa fa-picture-o" aria-hidden="true"></i></a>
                              </td>
                            </tr>

                                  <script type="text/javascript">
                                  function tog{{ $df_invi->dfform }}(){
                                    <?php $mjtogg = 'Unavailable'; ?>
                                    document.getElementById('mjtogglesideee{{ $df_invi->dfform }}').className = 'mj-toggleside mj-togglesideshow';
                                    document.getElementById('mjbodytoggle').className = 'mj-body mj-border badge-dark mj-bodytoggle';
                                  }
                                  </script>


                          <?php endforeach; ?>


                      </tbody>
                  </table>


                </div>
  <p style="margin:3rem">&nbsp;</p>
              </div>
@include('layouts.mjmodal')
@endsection
