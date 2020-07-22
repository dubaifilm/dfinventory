@extends('layouts.layout')
@section('content')
  <div class="container mj-white mj-background">
                <div class="title m-b-md mj-margin-top">
                  Edit Items here
                  <p></p>
                </div>
                <div class="container-fluid mj-border" style="margin-top:30px;margin-bottom:30px;">
                <form class="form-group" method="post">
                  @csrf
                    <div class="form-inline">
                      <label for="dfserial" class="form-label">&nbsp;Serial Number:&nbsp;</label>
                      <input type="text" class="form-control" name="dfserial" id="dfserial" value="{{ $editinv->dfserial }}">
                      <label for="dfstatus" class="form-label">&nbsp;Status: &nbsp;</label>
                      <input type="text" class="form-control" name="dfstatus" id="dfstatus" value="{{ $editinv->dfstatus }}">
                    </div><br/>
                    <div class="form-group">
                      <label for="dfitem" class="form-label">&nbsp;Item: &nbsp;</label>
                      <input type="text" class="form-control" name="dfitem" id="dfitem" value="{{ $editinv->dfitem }}">
                      <label for="dfcategory" class="form-label">&nbsp;Category: &nbsp;</label>
                      <select class="form-control" name="dfcategory" value="{{ $editinv->dfcategory }}">
                        <option value="{{ $editinv->dfcategory }}" style="display:none" selected>{{ $editinv->dfcategory }}</option>
                        <option value="Cameras">Cameras</option>
                        <option value="Action Camera">Film Lenses</option>
                        <option value="Stills Lenses">Stills Lenses</option>
                        <option value="Handheld Gimbals">Handheld Gimbals</option>
                        <option value="Underwater Cinematography">Underwater Cinematography</option>
                        <option value="Remote Heads">Remote Heads</option>
                        <option value="Cranes">Cranes</option>
                        <option value="Cable Cam">Cable Cam</option>
                        <option value="Drones">Drones</option>
                        <option value="Other">Other</option>
                      </select>
                      </div>
                      <div class="form-inline  d-flex justify-content-center">
                      <label class="form-inline">&nbsp;Current Storage: {{ $editinv->dfstorage }}: &nbsp;</label>
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
                    <div class="form-group">
                      <label for="dfdescription" class="form-label">Description: </label>
                      <input type="text" class="form-control" name="dfdescription" value="{{ $editinv->dfdescription }}" id="dfdescription">
                    </div>
                    <div class="form-inline">
                      <input type="submit" class="btn btn-sm btn-danger mj-half" name="dfeditsubmit"  value="Update">
                      <a href="/" class="btn btn-sm btn-light mj-half">Back</a>
                    </div>

                </form>

              </div>
              </div>


@endsection
