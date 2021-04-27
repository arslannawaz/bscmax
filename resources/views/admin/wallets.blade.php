@extends('admin.layouts.app')

@section('page_title','Wallets')

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
            <h1 class="m-0 text-dark">Wallets</h1>
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
                <a href="{{url('admin/add-wallet')}}" class="btn btn-md btn-primary" style="float: right;">Add Wallet</a>
                <!-- <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal" class="btn btn-md btn-primary" style="float: right;">Import Excel</a> -->
              </div>
              <!-- model -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add File</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                         
                           <div class="form-group">
                            <label for="exampleInputEmail1">Excel File</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" name="file"  required="" >
                            
                          </div>
                           
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" value="Import" name="add">
                    </div>
                    </form>
                  </div>
                </div>
              </div>

              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                     <th>ID</th>
                    <th>Project name</th>
                    <th>Pre sale started</th>
                    <th>Whitelisted</th>
                    <th>Country</th>
                    <th>Wallet type</th>
                    <th>Wallet address</th>
                    <th>Number BSMX staked</th>
                    <th>Max BNB per wallet</th>
                    <th>Purchased BNB amount </th>
                    <th>Wallet </th>
                     <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($wallets->data as $row)
                       <tr>
                          <td>{{$row->_id}}</td>
                          <td>{{$row->projName}}</td>
                          <td>{{$row->preSaleStarted}}</td>
                          <td>{{$row->whiteListed}}</td>
                          <td>{{$row->country}}</td>
                          <td>{{$row->walletType}}</td>
                          <td>{{$row->walletAddress}}</td>
                          <td>{{$row->numberBsmxStaked}}</td>
                          <td>{{$row->maxBNBPerWallet}}</td>
                          <td>{{$row->purchasedBNBAmount}}</td>
                          <td>{{$row->wallet}}</td>
                          
                          <td style="width: 30%">
                            <a href="{{route('editwallet',$row->_id)}}" class="btn btn-sm btn-info">Edit</a>
                            <!-- <a href="" class="btn btn-sm btn-primary">Save changes</a> -->
                            <a href="{{route('deletewallet',$row->_id)}}" class="btn btn-sm btn-danger">Delete</a>

                          </td>
                        </tr>
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