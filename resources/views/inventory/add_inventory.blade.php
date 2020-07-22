@extends('layouts.layout')
@section('content')
  <div class="container mj-white mj-background">


                <div class="title m-b-md mj-margin-top ">
                  Add Items here

                </div>
                <?php if (!session('mssg')): ?>
                  <?php else: ?>
                    <div class="alert alert-success" role="alert">
                        {{session('mssg')}}
                      </div>
                <?php endif; ?>


                <form class="form-group" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="form-inline">
                      <label for="dfserial" class="form-label">&nbsp;Serial Number:&nbsp;</label>
                      <input type="text" class="form-control" name="dfserial" id="dfserial">
                      <label for="dfstatus" class="form-label">&nbsp;Status: &nbsp;</label>
                      <input type="text" class="form-control" value="Available" name="dfstatus" id="dfstatus">
                    </div><br/>
                    <div class="form-group">
                      <label for="dfitem" class="form-label">&nbsp;Item: &nbsp;</label>
                      <input type="text" class="form-control" name="dfitem" id="dfitem">

                      <label for="dfcategory" class="form-label">&nbsp;Category: &nbsp;</label>
                      <select class="form-control" name="dfcategory">
                        <option value="CAMERAS">CAMERAS</option>
                        <option value="REMOTE HEADS">REMOTE HEADS</option>
                        <option value="CRANES">CRANES</option>
                        <option value="CABLE CAM">CABLE CAM</option>
                        <option value="DRONES">DRONES</option>
                        <option value="FILM LENSES">FILM LENSES</option>
                        <option value="STILLS LENSES">STILLS LENSES</option>
                        <option value="ANDHELD GIMBALS">HANDHELD GIMBALS</option>
                        <option value="UNDERWATER CINEMATOGRAPHY">UNDERWATER CINEMATOGRAPHY</option>
                        <option value="OTHERS">OTHERS</option>
                      </select>
                      </div>
                      <div class="row">
                        <div class="col-md-2">
                          <label for="dfproductimg" class="form-label">&nbsp;Image: &nbsp;</label>
                        </div>
                        <div class="col-md-10">
                          <input type="file" class="form-control" name="dfproductimg" id="dfproductimg" style="height:auto;">
                        </div>

                        <div class="col-md-2">
                          <label class="form-label">&nbsp;Item Storage: &nbsp;</label>
                        </div>
                        <div class="col-md-10 d-flex justify-content-center">
                          <select class="form-control" name="dfstorage1">
                            <option value="Grey Box">Grey Box</option>
                            <option value="Black Racks">Black Racks</option>
                            <option value="Grey Racks">Grey Racks</option>
                            <option value="Blue Containers">Blue Containers</option>
                            <option value="Red Containers">Red Containers</option>
                          </select>
                          <select class="form-control" name="dfstorage2">
                            <option value="red">red</option>
                            <option value="yellow">yellow</option>
                            <option value="blue">blue</option>
                            <option value="white">white</option>
                            <option value="green">green</option>
                          </select>
                          <select class="form-control" name="dfstorage3">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                          </select>
                        </div>




                    </div>
                    <div class="form-group">
                      <label for="dfdescription" class="form-label">Description: </label>
                      <input type="text" class="form-control" name="dfdescription" id="dfdescription">
                    </div>
                  <input type="submit" class="btn btn-sm btn-danger" name="dfsubmit" value="Submit">
                  <a href="/" class="btn btn-sm btn-danger">Back</a>

                </form>

  </div>
@endsection
