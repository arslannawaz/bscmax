@extends('admin.layouts.app')

@if(isset($project)) 
@section('page_title','Edit Project')
@endif
@section('page_title','Add Project')


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
            <h1 class="m-0 text-dark">@if(isset($project)) Edit Project @else Add Project @endif</h1>
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
              <form role="form" method="post"  @if(isset($project)) action="{{route('updateproject',$project->_id)}}" @else action="{{route('storeproject')}}"  @endif  enctype="multipart/form-data">
                @csrf
                @if(isset($project))
                    <input type="hidden" name="old_picture" value="{{$project->logoImage}}">
                @endif
                <div class="card-body">
                    <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="@if(isset($project)){{$project->name}}@endif" placeholder="Enter name" required>
                  </div>
                  <div class="form-group">
                    <label for="name">Description</label>
                    <textarea class="form-control" name="description" required>@if(isset($project)){{$project->description}}@endif</textarea>
                  </div>
                  <div class="form-group">
                    <label for="logo">Logo</label>
                    <input type="file" class="form-control" id="logo" name="file" @if(!isset($project)) required @endif >
                  </div>
                    <div class="form-group">
                    <label for="token">Token Address</label>
                    <input type="text" class="form-control" value="@if(isset($project)){{$project->tokenAddress}}@endif"  id="token" name="token_address" placeholder="Write token address" required>
                  </div>

                  <div class="form-group">
                    <label for="total">total supply</label>
                    <input type="text" class="form-control" value="@if(isset($project)){{$project->totalSupply}}@endif"  id="total" name="token_supply" placeholder="Write total supply" required>
                  </div>
                  <div class="form-group">
                    <label for="listing">Listing date /time</label>
                    <input type="text" class="form-control" value="@if(isset($project)){{$project->listingTimeDate}}@endif"  id="listing" name="listing_date" placeholder="Write listing date">
                  </div>
                  <div class="form-group">
                    <label for="listing">BNB per token</label>
                    <input type="text" class="form-control" value="@if(isset($project)){{$project->BNBPerToken}}@endif"  id="listing" name="bnb_token" placeholder="Write bnb token" required>
                  </div>
                  <div class="form-group">
                    <label for="listing">BNB raised</label>
                    <input type="text" class="form-control" value="@if(isset($project)){{$project->BNBRaised}}@endif"  id="listing" name="bnb_raised" placeholder="Write BNB raised" required=>
                  </div>
                  <div class="form-group">
                    <label for="listing">Softcap</label>
                    <input type="text" class="form-control" value="@if(isset($project)){{$project->softCap}}@endif"  id="listing" name="softcap" placeholder="Write Softcap" required>
                  </div>
                   <div class="form-group">
                    <label for="listing">Hard cap</label>
                    <input type="text" class="form-control" value="@if(isset($project)){{$project->hardCap}}@endif"  id="listing" name="hardcap" placeholder="Write Hard cap" required>
                  </div>
                  <div class="form-group">
                    <label for="listing">Min per Wallet</label>
                    <input type="text" class="form-control" value="@if(isset($project)){{$project->minPerWallet}}@endif"  id="listing" name="min_wallet" placeholder="Write Min per Wallet" required>
                  </div>
                  <div class="form-group">
                    <label for="listing">Max per Wallet</label>
                    <input type="text" class="form-control" value="@if(isset($project)){{$project->maxPerWallet}}@endif"  id="listing" name="max_wallet" placeholder="Write Max per Wallet" required>
                  </div>
                  <div class="form-group">
                    <label for="listing">Presale rate</label>
                    <input type="text" class="form-control" value="@if(isset($project)){{$project->preSaleRate}}@endif"  id="listing" name="presale_rate" placeholder="Write Presale rate" required>
                  </div>
                  <div class="form-group">
                    <label for="listing">Pancake swap price</label>
                    <input type="text" class="form-control" value="@if(isset($project)){{$project->panCakeSwapPrice}}@endif"  id="listing" name="pancake_swap_price" placeholder="Write Pancake swap price" required>
                  </div>
                  <div class="form-group">
                    <label for="listing">Liquidity allocation</label>
                    <input type="text" class="form-control" value="@if(isset($project)){{$project->liquidityAllocation}}@endif"  id="listing" name="liquidity_allocation" placeholder="Write Liquidity allocation" required>
                  </div>
                  <div class="form-group">
                    <label for="listing">Liquidity Duration</label>
                    <input type="text" class="form-control" value="@if(isset($project)){{$project->liquidityDuration}}@endif"  id="listing" name="liquidity_duration" placeholder="Write Liquidity duration" required>
                  </div>
                  <!-- <div class="form-group">
                    <label for="listing">Liquidity lock</label>
                    <input type="text" class="form-control" value="{{old('Liquidity_lock')}}"  id="listing" name="Liquidity_lock" placeholder="Write Liquidity lock" required="">
                  </div> -->
                  <div class="form-group">
                    <label for="listing">Open time/ date</label>
                    <input type="text" class="form-control" value="@if(isset($project)){{$project->openTimeDate}}@endif"  id="listing" name="open_date" placeholder="Write Open time/ date" required>
                  </div>
                   <div class="form-group">
                    <label for="listing">Close time/date</label>
                    <input type="text" class="form-control" value="@if(isset($project)){{$project->closeTimeDate}}@endif"  id="listing" name="close_date" placeholder="Write Close time/date" required>
                  </div>

                  <div class="form-group">
                    <label for="listing">Status</label>
                    <select class="form-control" name="status" required>
                      <option @if(isset($project)) @if($project->status=='Open') selected @endif @endif value="Open">Open</option>
                       <option @if(isset($project)) @if($project->status=='Closed') selected @endif @endif value="Closed">Closed</option>
                        <option @if(isset($project)) @if($project->status=='Coming') selected @endif @endif value="Coming">Coming</option>
                         <option @if(isset($project)) @if($project->status=='Draft') selected @endif @endif value="Draft">Draft</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="listing">Smart Contract Address</label>
                    <input type="text" class="form-control" value="@if(isset($project)){{$project->smartContractAddress}}@endif"  id="listing" name="contact_address" placeholder="Write Smart Contract Address" required>
                  </div>
                  <div class="form-group">
                    <label for="listing">Go swap address</label>
                    <input type="text" class="form-control" value="@if(isset($project)){{$project->goSwapAddress}}@endif"  id="listing" name="swap_address" placeholder="Write Go swap address" required>
                  </div>
                  <div class="form-group">
                    <label for="listing">Website</label>
                    <input type="text" class="form-control" value="@if(isset($project)){{$project->website}}@endif"  id="listing" name="website" placeholder="Write website" required>
                  </div>
                  <div class="form-group">
                    <label for="listing">Twitter</label>
                    <input type="text" class="form-control" value="@if(isset($project)){{$project->twitterLink}}@endif"  id="listing" name="twitter" placeholder="Write twitter" required>
                  </div>
                  <div class="form-group">
                    <label for="listing">Medium</label>
                    <input type="text" class="form-control" value="@if(isset($project)){{$project->mediumLink}}@endif"  id="listing" name="medium" placeholder="Write medium" required>
                  </div>
                   <div class="form-group">
                    <label for="listing">Telegram</label>
                    <input type="text" class="form-control" value="@if(isset($project)){{$project->telegramLink}}@endif"  id="listing" name="telegram" placeholder="Write telegram" required>
                  </div>

                   <div class="form-group">
                    <label for="listing">Publish</label>
                    <select class="form-control" name="publish" required>
                      <option @if(isset($project)) @if($project->publish==true) selected @endif @endif value="true">Yes</option>
                       <option @if(isset($project)) @if($project->publish==false) selected @endif @endif value="false">No</option>
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