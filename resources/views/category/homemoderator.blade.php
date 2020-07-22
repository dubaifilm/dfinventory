@extends('layouts.layout')
@section('content')

                <div class="title m-b-md">
                  Home Moderator
                </div>
                <form class="" action="/marcc/user" method="post">
                  @csrf
                  <label for="name">Name: </label>
                  <input type="text" name="name" id="name">
                  <label for="age">Age: </label>
                  <input type="number" name="age" id="age">
                  <label for="position">Position: </label>
                  <input type="text" name="position" id="position">
                  <label for="category">Category: </label>
                  <select class="" name="category">
                    <option value="xline booth">xline booth</option>
                    <option value="xline landing">xline landing</option>
                    <option value="xline take off">xline take off</option>
                    <option value="dubai film office">dubai film office</option>
                  </select>
                  <input type="submit" name="submit" value="submit">
                </form>

@endsection
