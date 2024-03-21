@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
  <h1>Dashboard</h1>
@stop
@section('content')
  <div class="card-body">
    <form>
      <div class="row">
        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group row">
            <label for="inputLevelID" class="col-sm-2 col-form-label">Level ID</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="inputLevelID" placeholder="Level ID">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputKode" class="col-sm-2 col-form-label">Kode Level</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputKode" placeholder="Kode Level">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputNama" placeholder="Nama Level">
            </div>
          </div>
          <button type = "submit" class ="btn btn-info">Submit </button>
          </div>
        </div>
      </div>
    </form>
  </div>
    <div class="card-body">
      <form>
        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group row">
              <label for="inputUserID" class="col-sm-2 col-form-label">User ID</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="inputUserID" placeholder="User ID">
              </div>
            </div>
            <div class="form-group">
              <label>Level User</label>
              <select class="form-control">
                <option>Level Admin</option>
                <option>Level User</option>
              </select>
            </div>
            <div class="form-group row">
                <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputNama" placeholder="Nama User">
                </div>
            </div>
            <div class="form-group row">
              <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputUsername" placeholder="Username">
              </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                </div>
            </div>
            <button type = "submit" class ="btn btn-info">Submit </button>
            </div>
        </div>
      </form>
@stop
@section('css')
{{-- Add here extra stylesheets --}}
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop
@section('js')
<script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop