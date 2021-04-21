@extends('admin.layouts.app')

@section('page_title','Project Opened')

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
            <h1 class="m-0 text-dark">Project Opened</h1>
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
               
              </div>

              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                     <th>ID</th>
                    <th>Name</th>
                    <th>Logo</th>
                    <th>Publish</th>
                    <th>Status</th>
                    <th>Token address</th>
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
                    <th>Liquidity lock</th>
                    <th>Open time/ date</th>
                    <th>Close time/date</th>
                    <th>Token contract address</th>
                    <th>Pancake swap address</th>
                     <th>Locked liquidity address</th>
                     <th>Goswapp Address</th>
                     <th>Presale Contract Adress</th>
                     <th>Social media</th>
                     <th>Medium link</th>
                     <th>Twitter link</th>
                     <th>Telegram link</th>
                     <th>Website link</th>
                     <th>Discord</th>
                     <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                       <tr>
                          <td>1</td>
                          <td>8pay</td>
                          <td>Yes</td>
                          <td>No</td>
                          <td></td>
                          <td>BSC Wallet</td>
                          <td>fsdfs5434534</td>
                          <td>42523</td>
                          <td>342</td>
                          <td>5</td>
                          <td>Enable</td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td style="width: 30%">
                          <a href="{{url('admin/edit-project')}}" class="btn btn-sm btn-info">Edit</a>
                          <a href="" class="btn btn-sm btn-primary">Save changes</a>
                          <a href="" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                        
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