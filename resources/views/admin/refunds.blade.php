@extends('admin.layouts.app')

@section('page_title','Refunds')

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
            <h1 class="m-0 text-dark">Refunds</h1>
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
              <a href="{{url('admin/add-refund')}}" class="btn btn-md btn-primary" style="float: right;">Add Refund</a>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                     <th>ID</th>
                    <th>Project Name</th>
                    <th>Whitelisted</th>
                    <th>Wallet Address</th>
                    <th>Purchased Amount</th>
                    <!-- <th>Get Refund Button</th> -->
                    <th>Refund Amount </th>
                     <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($refunds->data as $row)
                       <tr>
                          <td>{{$row->_id}}</td>
                          <td>{{$row->projName}}</td>
                          <td>{{$row->whiteListed}}</td>
                          <td>{{$row->walletAddress}}</td>
                          <td>{{$row->purchaseAmount}}</td>
                          <!-- <td>{{$row->getRefundButton}}</td> -->
                          <td>{{$row->refundAmount}}</td>  
                          <td style="width: 30%">
                            <a href="{{route('editrefund',$row->_id)}}" class="btn btn-sm btn-info">Edit</a>
                            <!-- <a href="" class="btn btn-sm btn-primary">Save changes</a> -->
                            <a href="{{route('deleterefund',$row->_id)}}" class="btn btn-sm btn-danger">Delete</a>
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