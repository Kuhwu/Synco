@extends('layout.app')
  @section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Add New Student</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <!-- form start -->
              <form action="" method="POST">
              {{csrf_field()}}
                <div class="card-body">
                    <div class = "row">
                        <div class="form-group col-md-6">
                            <label>Name<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="name" value = "{{old('name')}}" placeholder="First Name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Profile Picture<span style="color: red;">*</span></label>
                            <input type="file" class="form-control" name="profile_pic">
                        </div>
                    </div>
                    
                    <hr />

                  <div class="form-group">
                    <label>Email address<span style="color: red;">*</span></label>
                    <input type="email" class="form-control" name="email" value = "{{old('email')}}"  placeholder="Email" required>
                    <div style="color:red">{{$errors->first('email')}}</div>
                  </div>
                  <div class="form-group">
                    <label>Password<span style="color: red;">*</span></label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


  @endsection