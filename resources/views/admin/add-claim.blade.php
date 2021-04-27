@extends('admin.layouts.app')
@if(isset($claimtoken)) 
@section('page_title','Edit Claim Token')
@endif
@section('page_title','Add Claim Token')

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
            <h1 class="m-0 text-dark">@if(isset($claimtoken)) Edit Claim Token @else Add Claim Token @endif</h1>
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
              <form role="form" method="post" @if(isset($claimtoken)) action="{{route('updateclaim',$claimtoken->_id)}}" @else action="{{route('storeclaim')}}"  @endif  enctype="multipart/form-data">
                @csrf
                    @if(isset($claimtoken))
                    <input type="hidden" name="id" value="{{$claimtoken->_id}}">
                    @endif
                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Project Name</label>
                      <input type="text" class="form-control" id="name" name="projectname" value="@if(isset($claimtoken)){{$claimtoken->projName}}@endif" placeholder="Enter Project Name" required>
                    </div>

                    <div class="form-group">
                      <label for="name">Pre Sale Date Time Start</label>
                      <input type="datetime-local" class="form-control"  name="preSaleDateTimeStart" value="@if(isset($claimtoken)){{$claimtoken->preSaleDateTimeStart}}@endif"  required>
                    </div>

                    <div class="form-group">
                      <label for="name">Pre Sale Date Time Close</label>
                      <input type="datetime-local" class="form-control"  name="preSaleDateTimeClose" value="@if(isset($claimtoken)){{$claimtoken->preSaleDateTimeClose}}@endif"  required>
                    </div>

                    <div class="form-group">
                      <label for="name">Number Of Participant</label>
                      <input type="number" class="form-control"  name="numberOfParticipant" value="@if(isset($claimtoken)){{$claimtoken->numberOfParticipant}}@endif" required>
                    </div>

                    <div class="form-group">
                      <label for="name">Number Of Token Purchased</label>
                      <input type="number" class="form-control"  name="numberOfTokenPurchased" value="@if(isset($claimtoken)){{$claimtoken->numberOfTokenPurchased}}@endif" required>
                    </div>

                    <div class="form-group">
                      <label for="name">Number Of BNB Raised</label>
                      <input type="number" class="form-control"  name="numberOfBNBRaised" value="@if(isset($claimtoken)){{$claimtoken->numberOfBNBRaised}}@endif" required>
                    </div>

                    <div class="form-group">
                      <label for="name">Purchase Progress Percentage</label>
                      <input type="number" class="form-control"  name="purchaseProgressPercentage" value="@if(isset($claimtoken)){{$claimtoken->purchaseProgressPercentage}}@endif" required>
                    </div>

                    <div class="form-group">
                      <label for="name">Claim Token</label>
                      <input type="number" class="form-control"  name="claimToken" value="@if(isset($claimtoken)){{$claimtoken->claimToken}}@endif" required>
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