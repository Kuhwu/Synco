@extends('layout.app')
  @section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Teacher</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <!-- adjust Table -->
          <div class="col-md-12"> 

          @include ('message')
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Admin List </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Created Date</th>
                    </tr>
                  </thead>
                  
                </table>
                <div style="padding: 10px; float: right;">
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
  @endsection