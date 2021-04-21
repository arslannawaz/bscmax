@extends('admin.layouts.app')
@if(isset($users)) 
@section('page_title','Edit Admin')
@endif
@section('page_title','Add Admin')

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
            <h1 class="m-0 text-dark">@if(isset($users)) Edit Admin @else Add Admin @endif</h1>
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

          <div @if(isset($users)) class="col-md-4" @else class="col-md-8" @endif>         

          @include('admin.include.alerts')
            <!-- general form elements -->
            <div class="card card-primary">
              <form role="form" method="post" @if(isset($users)) action="{{route('updateadmin',$users->_id)}}" @else action="{{route('storeadmin')}}"  @endif  enctype="multipart/form-data">
                @csrf
                    @if(isset($users))
                    <input type="hidden" name="id" value="{{$users->_id}}">
                    <input type="hidden" name="old_picture" value="{{$users->picture}}">
                    @endif
                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" value="@if(isset($users)){{$users->name}}@endif" placeholder="Enter name" required="">
                    </div>
                    <div class="form-group">
                      <label for="logo">Picture</label>
                      <input type="file" class="form-control" id="logo" name="picture"  @if(!isset($users)) required @endif>
                    </div>
                    <div class="form-group">
                        <label for="token">Email Address</label>
                    <input type="email" class="form-control" value="@if(isset($users)){{$users->email}}@endif"  id="token" name="email" placeholder="Write email address" required="">
                    </div>

                    @if(!isset($users))
                    <div class="form-group">
                      <label for="total">Password</label>
                      <input type="password" class="form-control" value=""  id="total" name="password" placeholder="password" required="">
                    </div>
                    @endif
                  </div>
                  
                  <!-- <div class="form-group">
                    <label for="listing">Re Type Password</label>
                    <input type="password" class="form-control" value="{{old('re_password')}}"  id="listing" name="re_password" placeholder="Re-Type Password" required="">
                  </div> --> 

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" style="float: right;background-color: #FD5814;border:none;" name="submit" >Save</button>
                  </div>
              </form>
            </div>
          </div>

          @if(isset($users))
          <div class="col-md-4">
            <img width='100%' src='{{$users->picture}}'>
          </div>
          @endif

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