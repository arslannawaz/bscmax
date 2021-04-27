@extends('admin.layouts.app')
@if(isset($wallet)) 
@section('page_title','Edit Wallet')
@endif
@section('page_title','Add Wallet')

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
            <h1 class="m-0 text-dark">@if(isset($wallet)) Edit Wallet @else Add Wallet @endif</h1>
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
              <form role="form" method="post" @if(isset($wallet)) action="{{route('updatewallet',$wallet->_id)}}" @else action="{{route('storewallet')}}"  @endif  enctype="multipart/form-data">
                @csrf
                    @if(isset($wallet))
                    <input type="hidden" name="id" value="{{$wallet->_id}}">
                    @endif
                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Project Name</label>
                      <input type="text" class="form-control" id="name" name="projectname" value="@if(isset($wallet)){{$wallet->projName}}@endif" placeholder="Enter Project Name" required>
                    </div>

                    <div class="form-group">
                      <label for="name">Pre Sale Started</label>
                      <input type="date" class="form-control"  name="presalestarted" value="@if(isset($wallet)){{$wallet->preSaleStarted}}@endif"  required>
                    </div>

                    <div class="form-group">
                      <label for="name">white Listed</label>
                      <input type="text" class="form-control"  name="whitelisted" value="@if(isset($wallet)){{$wallet->whiteListed}}@endif"  required>
                    </div>

                    <div class="form-group">
                      <label for="name">Country</label>
                      <input type="text" class="form-control"  name="country" value="@if(isset($wallet)){{$wallet->country}}@endif" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="name">Wallet Type</label>
                      <input type="text" class="form-control"  name="wallettype" value="@if(isset($wallet)){{$wallet->walletType}}@endif" required>
                    </div>

                    <div class="form-group">
                      <label for="name">walletAddress</label>
                      <input type="text" class="form-control"  name="walletaddress" value="@if(isset($wallet)){{$wallet->walletAddress}}@endif" required>
                    </div>

                    <div class="form-group">
                      <label for="name">Number Bsmx Staked</label>
                      <input type="number" class="form-control"  name="bsmx" value="@if(isset($wallet)){{$wallet->numberBsmxStaked}}@endif" required>
                    </div>

                    <div class="form-group">
                      <label for="name">Max BNB Per Wallet</label>
                      <input type="number" class="form-control"  name="maxbnbperwallet" value="@if(isset($wallet)){{$wallet->maxBNBPerWallet}}@endif" required>
                    </div>

                    <div class="form-group">
                      <label for="name">Purchased BNB Amount</label>
                      <input type="number" class="form-control"  name="purchasedbnbamount" value="@if(isset($wallet)){{$wallet->purchasedBNBAmount}}@endif" required>
                    </div>

                    <div class="form-group">
                        <label for="listing">Wallet</label>
                        <select class="form-control" name="wallet" required>
                            <option @if(isset($wallet)) @if($wallet->wallet=="Enable") selected @endif @endif value="Enable">Enable</option>
                            <option @if(isset($wallet)) @if($wallet->wallet=="Disable") selected @endif @endif value="Disable">Disable</option>
                        </select>
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