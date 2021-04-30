@extends('admin.layouts.app')
@if(isset($refund)) 
@section('page_title','Edit Refund')
@endif
@section('page_title','Add Refund')

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
            <h1 class="m-0 text-dark">@if(isset($refund)) Edit Refund @else Add Refund @endif</h1>
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
              <form role="form" method="post" @if(isset($refund)) action="{{route('updaterefund',$refund->_id)}}" @else action="{{route('storerefund')}}"  @endif  enctype="multipart/form-data">
                @csrf
                    @if(isset($refund))
                    <input type="hidden" name="id" value="{{$refund->_id}}">
                    @endif
                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Project Name</label>
                      <input type="text" class="form-control" id="name" name="projName" value="@if(isset($refund)){{$refund->projName}}@endif" placeholder="Enter Project Name" required>
                    </div>

                    <div class="form-group">
                      <label for="name">White Listed</label>
                      <input type="text" class="form-control"  name="whiteListed" value="@if(isset($refund)){{$refund->whiteListed}}@endif"  required>
                    </div>

                    <div class="form-group">
                      <label for="name">Wallet Address</label>
                      <input type="text" class="form-control"  name="walletAddress" value="@if(isset($refund)){{$refund->walletAddress}}@endif"  required>
                    </div>

                    <div class="form-group">
                      <label for="name">Purchase Amount</label>
                      <input type="number" class="form-control"  name="purchaseAmount" value="@if(isset($refund)){{$refund->purchaseAmount}}@endif"  required>
                    </div>

                    <div class="form-group">
                      <label for="name">Refund Amount</label>
                      <input type="number" class="form-control"  name="refundAmount" value="@if(isset($refund)){{$refund->refundAmount}}@endif"  required>
                    </div>

                  </div>
            
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" style="float: right;background-color: #FD5814;border:none;" name="submit" >Save</button>
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