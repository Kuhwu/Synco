@extends('layout.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Assigned</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Dropdown for Due Date -->
    <div class="container-fluid mt-3">
        <div class="row">
<<<<<<< HEAD
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Total: {{ $getTeacher->total() }} </h3>

                <p>Teacher List</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('teacher.list') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Total: {{ $getStudent->total() }} </h3>

                <p>Students list</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('student.list') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
=======
            <div class="col-sm-12 text-center">
                <select class="form-control">
                    <option value="">No Due Date</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Additional "No Due Date" options as dropdowns -->
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-sm-12 text-center">
                <!-- Dropdown for second "No Due Date" -->
                <select class="form-control">
                    <option value="">This Week</option>
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-12 text-center">
                <!-- Dropdown for third "No Due Date" -->
                <select class="form-control">
                    <option value="">Next Week</option>
                </select>
            </div>
        </div>
    </div>
>>>>>>> 4ebe37029e022ded209ccd46cb31f227af4af4a0

    <!-- Rest of your content goes here -->
</div>
@endsection