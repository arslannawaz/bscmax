@extends('admin.layouts.app')

@section('page_title','Projects')

@section('pagelevel_stylesheets')

  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
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
            <h1 class="m-0 text-dark">Projects</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
   <div class="row">
      <div class="col-md-12">
        <div class="container-fluid">
          
         @include('admin.include.alerts')
         <div class="card">
              <!-- /.card-header -->
              <div id="buttons"></div>
              <div class="card-header">
                <a href="{{url('admin/add-project')}}" class="btn btn-md btn-primary" style="float: right;">Add Project</a>
              </div>

              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                     <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Logo</th>
                    <th>Publish</th>
                    <th>Status</th>
                    <th>Token address</th>
                    <th>Total supply</th>
                    <th>Listing date /time</th>
                    <th>BNB per token</th>
                    <th>BNB raised</th>
                    <th>Softcap</th>
                    <th>Hard cap </th>
                    <th>Min per Wallet</th>
                    <th>Max per Wallet</th>
                    <th>Presale rate</th>
                    <th>Pancake swap price</th>
                    <th>Liquidity allocation</th>
                    <th>Liquidity duration</th>
                    <!-- <th>Liquidity lock</th> -->
                    <th>Smart contract address</th>
                    <th>Go swap address</th>
                    <th>Twitter</th>
                    <th>Medium</th>
                    <th>Website</th>
                    <th>Telegram</th>
                    <th>Open time/ date</th>
                    <th>Close time/date</th>
                    <th>Participants</th>
                    <th>Pancake Swap Address</th>
                    <th>Access</th>
                    <th>Expand</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($projects->data as $row)
                       <tr>
                          <td>{{$row->_id}}</td>
                          <td>{{$row->name}}</td>
                          <td>{{$row->description}}</td>
                          <td><img src="{{$row->logoImage}}" width="40px" height="40px"></td>
                          @if($row->publish==true)
                          <td>Yes</td>
                          @else
                          <td>No</td>
                          @endif
                          <td>{{$row->status}}</td>
                          <td>{{$row->tokenAddress}}</td>
                          <td>{{$row->totalSupply}}</td>
                          <td>{{$row->listingTimeDate}}</td>
                          <td>{{$row->BNBPerToken}}</td>
                          <td>{{$row->BNBRaised}}</td>
                          <td>{{$row->softCap}}</td>
                          <td>{{$row->hardCap}}</td>
                          <td>{{$row->minPerWallet}}</td>
                          <td>{{$row->maxPerWallet}}</td>
                          <td>{{$row->preSaleRate}}</td>
                          <td>{{$row->panCakeSwapPrice}}</td>
                          <td>{{$row->liquidityAllocation}}</td>
                          <td>{{$row->liquidityDuration}}</td>
                          <!-- <td>{{$row->description}}</td> -->
                          <td>{{$row->smartContractAddress}}</td>
                          <td>{{$row->goSwapAddress}}</td>
                           <td>{{$row->twitterLink}}</td>
                           <td>{{$row->mediumLink}}</td>
                           <td>{{$row->website}}</td>
                           <td>{{$row->telegramLink}}</td>
                           <td>{{$row->openTimeDate}}</td>
                           <td>{{$row->closeTimeDate}}</td>
                           <td>{{$row->participants}}</td>
                           <td>{{$row->panCakeSwapAddress}}</td> 
                           <td>{{$row->access}}</td>
                           <td>{{$row->expand}}</td> 
                          
                          <td style="width: 30%">
                          <a href="{{route('editproject',$row->_id)}}" class="btn btn-sm btn-info">Edit</a>
                          <a href="" class="btn btn-sm btn-primary">Save changes</a>
                          <a href="{{route('deleteproject',$row->_id)}}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                      @endforeach
                        
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
      </div>
    </div>
    <!-- Main content -->


    @endsection

    @section('pagelevel_scripts')
    <!-- DataTables -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": false,
       "scrollX": true
    });
  });
</script>
    

    @endsection