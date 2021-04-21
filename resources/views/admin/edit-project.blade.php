@extends('admin.layouts.app')

@section('page_title','Edit Project')

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
            <h1 class="m-0 text-dark">Edit Project</h1>
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
              <form role="form" method="post" action="" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="" placeholder="Enter name" required="">
                  </div>
                  <div class="form-group">
                    <label for="name">Description</label>
                    <textarea class="form-control" name="Description" required=""></textarea>
                  </div>
                  <div class="form-group">
                    <label for="logo">Logo</label>
                    <input type="file" class="form-control" id="logo" name="logo"  required="">
                  </div>
                    <div class="form-group">
                    <label for="token">Token Address</label>
                    <input type="text" class="form-control" value="{{old('token_address')}}"  id="token" name="token_address" placeholder="Write token address" required="">
                  </div>

                  <div class="form-group">
                    <label for="total">total supply</label>
                    <input type="text" class="form-control" value="{{old('total_supply')}}"  id="total" name="token_address" placeholder="Write total supply" required="">
                  </div>
                  <div class="form-group">
                    <label for="listing">Listing date /time</label>
                    <input type="text" class="form-control" value="{{old('listing_date')}}"  id="listing" name="listing_date" placeholder="Write listing date" required="">
                  </div>
                  <div class="form-group">
                    <label for="listing">BNB per token</label>
                    <input type="text" class="form-control" value="{{old('bnb_token')}}"  id="listing" name="bnb_token" placeholder="Write bnb token" required="">
                  </div>
                  <div class="form-group">
                    <label for="listing">BNB raised</label>
                    <input type="text" class="form-control" value="{{old('bnb_raised')}}"  id="listing" name="bnb_raised" placeholder="Write BNB raised" required="">
                  </div>
                  <div class="form-group">
                    <label for="listing">Softcap</label>
                    <input type="text" class="form-control" value="{{old('softcap')}}"  id="listing" name="softcap" placeholder="Write Softcap" required="">
                  </div>
                   <div class="form-group">
                    <label for="listing">Hard cap</label>
                    <input type="text" class="form-control" value="{{old('hardcap')}}"  id="listing" name="hardcap" placeholder="Write Hard cap" required="">
                  </div>
                  <div class="form-group">
                    <label for="listing">Min per Wallet</label>
                    <input type="text" class="form-control" value="{{old('min_wallet')}}"  id="listing" name="min_wallet" placeholder="Write Min per Wallet" required="">
                  </div>
                  <div class="form-group">
                    <label for="listing">Max per Wallet</label>
                    <input type="text" class="form-control" value="{{old('Max_wallet')}}"  id="listing" name="Max_wallet" placeholder="Write Max per Wallet" required="">
                  </div>
                  <div class="form-group">
                    <label for="listing">Presale rate</label>
                    <input type="text" class="form-control" value="{{old('Presale_rate')}}"  id="listing" name="Presale_rate" placeholder="Write Presale rate" required="">
                  </div>
                  <div class="form-group">
                    <label for="listing">Pancake swap price</label>
                    <input type="text" class="form-control" value="{{old('Pancake_swap_price')}}"  id="listing" name="Pancake_swap_price" placeholder="Write Pancake swap price" required="">
                  </div>
                  <div class="form-group">
                    <label for="listing">Liquidity allocation</label>
                    <input type="text" class="form-control" value="{{old('Liquidity_allocation')}}"  id="listing" name="Liquidity_allocation" placeholder="Write Liquidity allocation" required="">
                  </div>
                  <div class="form-group">
                    <label for="listing">Liquidity Duration</label>
                    <input type="text" class="form-control" value="{{old('Liquidity_allocation')}}"  id="listing" name="Liquidity_allocation" placeholder="Write Liquidity duration" required="">
                  </div>
                  <div class="form-group">
                    <label for="listing">Liquidity lock</label>
                    <input type="text" class="form-control" value="{{old('Liquidity_lock')}}"  id="listing" name="Liquidity_lock" placeholder="Write Liquidity lock" required="">
                  </div>
                  <div class="form-group">
                    <label for="listing">Open time/ date</label>
                    <input type="text" class="form-control" value="{{old('Open_date')}}"  id="listing" name="Open_date" placeholder="Write Open time/ date" required="">
                  </div>
                   <div class="form-group">
                    <label for="listing">Close time/date</label>
                    <input type="text" class="form-control" value="{{old('Close_date')}}"  id="listing" name="Close_date" placeholder="Write Close time/date" required="">
                  </div>

                  <div class="form-group">
                    <label for="listing">Status</label>
                    <select class="form-control" name="status" required="">
                      <option value="">Open</option>
                       <option value="">Closed</option>
                        <option value="">Coming</option>
                         <option value="">Draft</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="listing">Smart Contract Address</label>
                    <input type="text" class="form-control" value="{{old('Close_date')}}"  id="listing" name="Close_date" placeholder="Write Smart Contract Address" required="">
                  </div>
                  <div class="form-group">
                    <label for="listing">Go swap address</label>
                    <input type="text" class="form-control" value="{{old('Close_date')}}"  id="listing" name="Close_date" placeholder="Write Go swap address" required="">
                  </div>
                  <div class="form-group">
                    <label for="listing">Website</label>
                    <input type="text" class="form-control" value="{{old('Close_date')}}"  id="listing" name="Close_date" placeholder="Write website" required="">
                  </div>
                  <div class="form-group">
                    <label for="listing">Twitter</label>
                    <input type="text" class="form-control" value="{{old('Close_date')}}"  id="listing" name="Close_date" placeholder="Write twitter" required="">
                  </div>
                  <div class="form-group">
                    <label for="listing">Medium</label>
                    <input type="text" class="form-control" value="{{old('Close_date')}}"  id="listing" name="Close_date" placeholder="Write medium" required="">
                  </div>
                   <div class="form-group">
                    <label for="listing">Telegram</label>
                    <input type="text" class="form-control" value="{{old('Close_date')}}"  id="listing" name="Close_date" placeholder="Write telegram" required="">
                  </div>

                   <div class="form-group">
                    <label for="listing">Publish</label>
                    <select class="form-control" name="Publish" required="">
                      <option value="">Yes</option>
                       <option value="">No</option>
                    </select>
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