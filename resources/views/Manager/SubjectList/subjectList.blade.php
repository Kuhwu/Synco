@extends('layout.app')
  @section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subject List </h1>
          </div>

          <div class="col-sm-6" style="text-align: right;">
          <a href="{{url('manager/subject/add')}}" class="btn btn-primary"> Add New Subject</a>
          </div>

        </div>
      </div>
    </section>

    <section class="content">
      <div class="row">
          <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Search Subject</h3>
              </div>
              <form action="" method="GET">
              {{csrf_field()}}
                <div class="card-body">
                  <div class="row">
                <div class="form-group col-md-4">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value = "{{old('name')}}" placeholder="Name" >
                  </div>
                  <div class="form-group col-md-4">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date"  placeholder="Email" >
                    <div style="color:red">{{$errors->first('email')}}</div>
                  </div>

                  <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px;"> Search</button>
                    <a href="{{url('manager/subject/list')}}" class="btn btn-success" style="margin-top: 30px;" > Reset</a>
                  </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12"> 

          @include ('message')
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Subject List</h3>
              </div>
              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>  
                      <th>Name</th>
                      <th>Status</th>
                      <th>Created By</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach($getRecord as $value)
                     <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>
                            @if($value->status == 0) 
                                Active
                            @else
                                Inactive
                            @endif
                        </td>
                        <td>{{ $value->created_by_name }}</td>
                        <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                        <td>
                            <a href="{{url('manager/subject/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{url('manager/subject/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
                </table>
                <div style="padding: 10px; float: right;">
                {!! $getRecord->appends(request()->except('page'))->links() !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  @endsection