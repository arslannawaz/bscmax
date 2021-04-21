@extends('admin.layouts.app')

@section('page_title','Home Slider')

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
            <h1 class="m-0 text-dark">Home Sliders</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
   <div class="row">
      <div class="col-md-12">
        <div class="container">
          
         @include('admin.include.alerts')
         <div class="card">
              <!-- /.card-header -->
              <div id="buttons"></div>
              <div class="card-header">
               <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal2" class="btn btn-md btn-primary" style="float: right;margin-left: 5px;">Update link</a> &nbsp 
                <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal" class="btn btn-md btn-primary" style="float: right;">Add Slider</a>
              </div>
              <!-- model -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <form action="{{ url('admin/add-slider') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Add Image</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                         
                           <div class="form-group">
                            <label for="exampleInputEmail1">Image</label>
                            <input type="file" class="form-control" id="exampleInputEmail1" name="image"  required="" placeholder="Write menu name">
                            
                          </div>
                           
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" value="Done" name="add">
                    </div>
                    </form>
                  </div>
                </div>
              </div>

               <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <form action="{{ url('admin/update-link') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Update link</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                         
                           <div class="form-group">
                            <label for="exampleInputEmail1">Link</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="link" value="{{$data->link}}"  required="" >
                            
                          </div>
                           
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <input type="submit" class="btn btn-primary" value="Update" name="add">
                    </div>
                    </form>
                  </div>
                </div>
              </div>


              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                     <th>SR#</th>
                    <th>Image</th>
                     <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($sliders as $slider)
                       <tr>
                          <td>{{$loop->iteration}}</td>
                          <td><img src="{{url('public/storage/slider/'.$slider->image)}}" width="50px" height="50px"></td>
                          <td style="width: 20%">
                            {{-- <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal{{$menu->id}}" class="btn btn-sm btn-primary">Edit</a> --}}
                          <a href="{{ url('admin/delete/slider/'.$slider->id) }}" onclick="return confirm('Are you sure you want to delete')'" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    {{--  <div class="modal fade" id="exampleModal{{$menu->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <form action="{{ url('update-blog-menu/'.$menu->id) }}" method="post">
                              @csrf
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Menu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                   
                                     <div class="form-group">
                                      <label for="exampleInputEmail1">Name</label>
                                      <input type="text" class="form-control" id="exampleInputEmail1" name="name"  required="" value="{{$menu->name}}">
                                    </div>
                                     
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" value="Update" name="update">
                              </div>
                              </form>
                            </div>
                          </div>
                        </div> --}}
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
     <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>

    

    @endsection