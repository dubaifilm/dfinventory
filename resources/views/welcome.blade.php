@extends('layouts.layout')
@section('content')
<div id="mjbodytoggle" class="mj-body mj-border badge-dark">


<div class="container-fluid">


  <div class="d-flex justify-content-between flex-wrap">
<div class="d-flex align-items-end">
</div>

    <img src="/img/DubaiFilm_Logo - Copy.svg" alt="" class="imgposition1">
    <div><a id="mjmodalbtn" class="mj-cart" ><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
        <?php if (Auth::user()->user_auth === 'admin'): ?>
            <a href="/inventory/add_inventory" class="mj-plus" ><i class="fa fa-plus-square" aria-hidden="true"></i></a>
      <?php endif; ?>

  </div>
  </div>
    @if(session('mssg') === null)
    @else
      <div class="alert alert-dark alert-dismissible fade show" role="alert">
    {{session('mssg')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    <div class="container hometoggleside" id="hometoggleside">
      <input type="button" class="mj-btn-hover mj-btn-danger p-2" id="myTablecam" name="" value="CAMERAS">
      <input type="button" class="mj-btn-hover mj-btn-danger p-2" id="myTablecama" name="" value="REMOTE HEADS">
      <input type="button" class="mj-btn-hover mj-btn-danger p-2" id="myTablecamb" name="" value="CRANES">
      <input type="button" class="mj-btn-hover mj-btn-danger p-2" id="myTablecamc" name="" value="CABLE CAM">
      <input type="button" class="mj-btn-hover mj-btn-danger p-2" id="myTablecamd" name="" value="DRONES">
      <input type="button" class="mj-btn-hover mj-btn-danger p-2" id="myTablecame" name="" value="FILM LENSES">
      <input type="button" class="mj-btn-hover mj-btn-danger p-2" id="myTablecamf" name="" value="STILLS LENSES">
      <input type="button" class="mj-btn-hover mj-btn-danger p-2" id="myTablecamg" name="" value="HANDHELD GIMBALS">
      <input type="button" class="mj-btn-hover mj-btn-danger p-2" id="myTablecamh" name="" value="UNDERWATER CINEMATOGRAPHY">
    </div>

    <div class="container hometogglebody" id="hometogglebody">




      <table id="example" class="table borderless dt-responsive nowrap text-center" style="width:100%">
            <thead>
                <tr>

                    <th data-priority="1"></th>
                    <th data-priority="1">Serial Number</th>
                    <th data-priority="1">Item</th>
                      <th>Actions</th>
                    <th class="hidden">Status</th>
                    <th>Description</th>
                    <th class="hidden">Category</th>
                    <th class="">Remarks</th>
                    <th class="">Storage</th>

                </tr>
            </thead>
            <tbody>
                  <?php foreach ($df_inv as $df_invi): ?>

                      <tr>
                          <?php if ($df_invi->dfstatus === 'Available'): ?>
                        <td class="dtr-controlla" style="width:20%"><img src="img/equipments/{{ $df_invi->dfproductimg }}" style="border-radius: 20px;width:120px;height:auto;"></td>

                          <?php elseif($df_invi->dfstatus === 'Unavailable'): ?>
                              <td style="width:20%"><img src="/img/equipments/{{ $df_invi->dfproductimg }}" style="border-radius: 20px;width:120px;height:auto;"></td>
                              <?php endif; ?>
                        <td>{{ $df_invi->dfserial }}</td>

                          <td  class="mj-word-wrap">{{ $df_invi->dfitem }}</td>





                    <td>
                        <?php if (Auth::user()->user_auth === 'admin'): ?>
                      <a type="button" href="/inventory/edit_inventory/{{ $df_invi->id }}" class="btn btn-outline-success btn-sm" name="button" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>



                      <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#del{{ $df_invi->id }}" style="color:yellow;" title="Remove Item"><i class="fa fa-trash-o" aria-hidden="true"></i> </button>
  <?php endif; ?>
                      @if($df_invi->dfstatus === 'Unavailable')
                      <a type="button" href="/add_cart/{{ $df_invi->id }}" class="btn btn-outline-danger btn-sm disabled" title="Add to Cart"><i class="fa fa-sign-out" aria-hidden="true"></i> </a>
                      @else
                      <a type="button" href="/add_cart/{{ $df_invi->id }}" class="btn btn-outline-secondary btn-sm" title="Add to Cart"><i class="fa fa-sign-out" aria-hidden="true"></i> </a>
                      @endif
                    </td>
                    <td class="hidden">{{ $df_invi->dfstatus }}</td>
                    <td style="white-space: break-spaces !important;">{{ $df_invi->dfdescription }}</td>
                    <td class="hidden">{{ $df_invi->dfcategory }}</td>
                    <td class="">{{ $df_invi->dfremarks }}</td>
                    <td class="">{{ $df_invi->dfstorage }}</td>


                        </tr>
                  <?php endforeach; ?>
            </tbody>
        </table>

    </div>



        <?php foreach ($df_inv as $df_invi): ?>
    <div class="modal fade" id="del{{ $df_invi->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{ $df_invi->id }}" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="color:black;">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel{{ $df_invi->id }}">Confirm Delete</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p> {{$getid}}You are about to delete <b>{{ $df_invi->dfitem }}</b> with Serial Number of <b>{{ $df_invi->dfserial }}</b> record, this procedure is irreversible.</p>
            <p>Do you want to proceed?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            <form  method="post">
              <a href="/del/{{$df_invi->id}}" type="button" class="btn btn-danger">Delete</a>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
    $('#del{{ $df_invi->id }}').on('shown.bs.modal', function () {
$('#myInput').trigger('focus')
})
    </script>
      <?php endforeach; ?>
      <div id="mjmodal" class="mj-modal-md">
      <div class="mj-border-bottom">
        <a id="mjmodalhide">  <i class="fa fa-times mj-top-right" aria-hidden="true"></i></a>
        <p style="top:0;left:0;position:absolute;background-color:#eee;color:#000;padding: 10px 10px">Job No. DF00{{$dfcartcount}}</p>
        <h1 style="font-size:2rem">Equipment Checkout Form</h1>
      </div>
      <div class="container tablecart">

            <table class="table borderless dt-responsive nowrap">
              <tr>
                <th></th>
                <th>Serial Number</th>
                <th>Equipment</th>
                <th>Storage</th>

                <th></th>
              </tr>
            <form method="post" enctype="multipart/form-data">
                @csrf
                <?php foreach ($dfinvcart as $dfinvicart): ?>
                    <tr>
                      <td><img src="img/equipments/{{ $dfinvicart->dfproductimg }}" style="border-radius: 20px;width:120px;height:auto;"></td>
                      <td>{{ $dfinvicart->dfserial }}</td>
                      <td>{{ $dfinvicart->dfitem }}</td>
                      <td>{{ $dfinvicart->dfstorage }}</td>
                    <!-- name="dfstatusyy{{$dfinvicart->id}}"-->
                      <td><a type="button" class="btn btn-warning btn-sm" style="color:#fff" href="/remove_cart/{{ $dfinvicart->id }}" title="Remove Item"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                    </tr>
                <?php endforeach; ?>

              </table>



          <div class="container">
              <h3>Recipient Details<h3>
                <div class="form-inline">
                  <label for="" class="form-label mj-half">Upload Sub Item: </label>
                  <input style="height:auto;" class="form-control mj-half form-width" type="file" name="o_subfile[]" value="none" multiple optional/>
                </div>
                <div class="form-inline">
                  <label for="" class="form-label mj-half">Sub Item list: </label>
                  <select class="form-control mj-half form-width" multiple name="o_subf[]" id="tags" data-role="tagsinput" optional></select>
                </div>
              <div class="form-inline">
                <label for="" class="form-label mj-half">Name: </label>
                <input class="form-control mj-half form-width" type="text" name="o_name" value="" required>
              </div>
              <div class="form-inline">
                <label for="" class="form-label mj-half">Company ID: </label>
                <input class="form-control mj-half form-width" type="text" name="o_companyid" value="" required>
              </div>
              <div class="form-inline">
                <label for="" class="form-label mj-half">Project Name: </label>
                <input class="form-control mj-half form-width" type="text" name="o_projname" value="" required>
              </div>
              <div class="form-inline">
                <label for="" class="form-label mj-half">Project Date Start: </label>
                <input class="form-control mj-half form-width" type="date" name="o_projdate" value="" required>
              </div>
              <div class="form-inline">
                <label for="" class="form-label mj-half">Project Date End: </label>
                <input class="form-control mj-half form-width" type="date" name="o_projdura" value="" required>
              </div>
            </div>
      </div>
      <div class="mj-border-top">
        <div class="form-group" style="margin:3%">
          <input type="submit" class="btn mj-btn-danger btn-sm form-control" value="Check-out">
          <a type="button" class="btn mj-btn-danger btn-sm form-control" id="mjmodalcancel">Close</a>
        </div>
      </div>
  </form>
      </div>
</div>
                  <p style="margin:3rem">&nbsp;</p>
                  <p>{{ $getid }}</p>
                  <p>{{ $getname }}</p>
                  <!-- http://127.0.0.1:8000/?ProductID=0123&PName=Computerkemekeme -->
</div>
@endsection
