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

    <div class="box">
        <div class="box-header">
            <h3 class="box-title text-bold">Add New Class</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <form action="{{ url('/add-class') }}" method="post">
                {{ csrf_field() }}
                <div class="col-xs-4">
                    <input type="text" name="class_name" class="form-control" placeholder="New Class">
                </div>                
                <button type="submit" class="btn btn-success col-xs-2">Add New Class</button>
            </form>

        </div>
    </div>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title text-bold">CLasses</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
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
                                });</script>
<script type="text/javascript">
    function check_delete()
    {
    var chk = confirm("Are you sure to delete this ?");
    if (chk)
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
