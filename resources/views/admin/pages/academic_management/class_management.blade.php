@extends('admin.master')
 
@section('title', 'Student List')


@section('main-content')    


@push('css')     <!-- additional css-->
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('public/admin_assets')}}/plugins/datatables/dataTables.bootstrap.css">
<!-- toastr css -->
<link rel="stylesheet" href="{{asset('public/admin_assets')}}/plugins/toastr/toastr.css">

@endpush         <!-- end additional css-->


<!--Start main Content-->
@if(session('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Success</h4>
    {{ session('success') }}
</div>
@endif
@if(session('delete'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Success</h4>
    {{ session('delete') }}
</div>
@endif

<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Subject</a></li>
                <li><a href="#tab_2" data-toggle="tab">Section</a></li>
                <li><a href="#tab_3" data-toggle="tab">Class</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Dropdown <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <b>Tab 1</b>

                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    tab 2
                </div>
                <!-- /.tab-pane -->
                <!--CLASS tab-->
                <div class="tab-pane" id="tab_3">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Total Entries : {{ $classes->count() }}</h3>
                                    <button type="button" class="btn btn-success col-md-offset-4" data-toggle="modal" data-target="#add_class">Add New Class</button>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table id="table2" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>Class Name</th>
                                                <th>Created By</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(isset($classes))
                                            @foreach($classes as $v)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $v->class_name }}</td>
                                                <td>{{ $v->created_by }}</td>
                                                <td>
                                                    <a class="btn btn-default" data-toggle="modal" data-target="#edit_class" onclick="ajax_edit_view('{{ $v->id }}', '{{ url("/ajax-edit-view-".$v->id) }}', '#edit_class_view')"><span data-toggle="tooltip" data-placement="top" title="edit" class="glyphicon glyphicon-edit"></span></a>

                                                    <a class="btn btn-default" href="{{url('/delete-class-'.$v->id)}}" onclick="return confirm('Are you sure to delete this ?')"><span data-toggle="tooltip" data-placement="top" title="delete" class="glyphicon glyphicon-trash"></span></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>SN</th>
                                                <th>Class Name</th>
                                                <th>Created By</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <span class="pull-right">{{-- $classes->links() --}}</span>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>              
                    </div>

                    <!--MODALS-->                 

                    <!--add CLASS modal-->
                    <div class="modal modal-success fade" id="add_class" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Add New Class</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('/add-class') }}" method="post" id="add_class_form">
                                        {{ csrf_field() }}
                                        <div class="col-xs-12">
                                            <input type="text" name="class_name" class="form-control" placeholder="Add New Class">
                                        </div>
                                    </form>
                                    <br/><br/>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-outline" form="add_class_form">Add</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!--end add CLASS modal-->
                    <!--edit CLASS modal-->
                    <div class="modal modal-warning fade" id="edit_class" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Edit Class</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('/update-class') }}" method="post" id="edit_class_form">
                                        {{ csrf_field() }}
                                        <div class="col-xs-12" id="edit_class_view">


                                        </div>
                                    </form>
                                    <br/><br/>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-outline" form="edit_class_form">Update</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!--end edit CLASS modal-->
                    <!--DELETE CLASS modal-->
                    <div class="modal modal-danger fade" id="delete_class" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Add New Class</h4>
                                </div>
                                <div class="modal-body">

                                    <h1>Are you sure You want to Delete!!!</h1>
                                    <form name="delete_class_form">
                                    <input type="hidden" name="id" id="delete_class_id" value="">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">NO</button>
                                    <button class="btn btn-outline">DELETE</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!--end Delete CLASS modal-->




                    <!--end MODALS-->            
                </div>
                <!--end CLASS tab-->
            </div>
        </div>
    </div>
</div>


<!--End Main Content-->
@push('scripts')  <!-- additional Script-->
<!-- toastr script -->
<script src="{{asset('public/admin_assets')}}/plugins/toastr/toastr.min.js"></script>
<!--ajax-->
<script>
    function ajax_edit_view(id, link, des)
    {
      $.ajax({
        url: link,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          $(des).html(result.res);
        }
      });
    };
    function send_delete_id(id, des) {
        $(des).val(id);
    }
    //     function update_class()(id, link, des)
    // {
    //   $.ajax({
    //     url: link,
    //     type:"GET", 
    //     data: {"id":id,
    //           "class_name":
    //           }, 
    //     success: function(result){
    //       $(des).html(result.res);
    //     // toastr.error('Item Created Successfully.', 'Success Alert', {
    //     //     timeOut: 2000,
    //     //     progressBar: true,
    //     //     closeButton: true,
    //     // });
    //     //     location.reload(2000);
    //     }
    //   });
    // };

</script>
<!-- DataTables -->
<script src="{{asset('public/admin_assets')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public/admin_assets')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- page script -->
<script>
$(function () {
    $("#table1").DataTable();
    $('#table2').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": false,
        "autoWidth": true
    });
});
</script>
<script type="text/javascript">
    function check_delete()
    {
        var chk=confirm("Are you sure to delete this ?");
        if(chk)
        {
            return true;
        }
        else{
            return false;
        }
    }
</script>
@endpush<!-- End additional Script-->
@endsection
