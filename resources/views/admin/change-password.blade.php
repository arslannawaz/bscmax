@extends('admin.layouts.app')

@section('page_title','Update Password')

@section('pagelevel_stylesheets')
<style>
   .active
    {
      background-color: #FD5814 !important;
    }
    body
    {
      overflow-x: hidden;
    }
</style>
@endsection

@section('contant')

<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Password</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
     <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
         <div class="col-md-2"></div>
         <div class="col-md-8">
          @include('admin.include.alerts')
            <!-- general form elements -->
            <div class="card card-primary">
              <form role="form" method="post" action="{{ url('update-password') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{Auth::user()->email}}" required="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Current Password</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" name="current" placeholder="Enter Current" value="{{old('current')}}" required="">
                  </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" value="{{old('password')}}"  id="exampleInputEmail1" name="password" placeholder="Write new password" required="">
                  </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Confirm</label>
                    <input type="password" class="form-control" value="{{old('confirm')}}"  id="exampleInputEmail1" name="confirm" placeholder="Write Password Again" required="">
                  </div>                 
                

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" style="float: right;background-color: #FD5814;border:none;" name="submit" >Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->


    @endsection

    @section('pagelevel_scripts')

    <script>
      $(function () {
        // Summernote
        $('.textarea').summernote()
      })
    </script>

    @endsection