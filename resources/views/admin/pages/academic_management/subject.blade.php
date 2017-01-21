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


    <div class="box box-primary" id="add_grade">
        <div class="box-header with-border">
            <h3 class="box-title text-bold">Add Subject</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{ url('/add-subject') }}" method="post" role="form">
            {{ csrf_field() }}
            <div class="box-body" id="add_grade_form">

                <div class="form-group col-md-4">
                    <label for="class_names_id">Class</label>
                    <select name="class_names_id" class="form-control" id="class_names_id">
                        @foreach($class_names as $v)
                        <option value="{{$v->id}}">{{$v->class_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="subject_name">Subject</label>
                    <input type="text" name="subject_name" class="form-control" id="subject_name" placeholder="(Ex: English)">
                </div>

                <div class="form-group col-md-4">
                    <label for="total_mark">Total Mark</label>
                    <input type="number" class="form-control" id="total_mark" disabled>
                </div>

                <div class="form-group col-md-3">
                    <label for="written_mark">Written</label>
                    <input type="text" name="written_mark" class="form-control" id="written_mark" onkeyup="sum()">
                </div>

                <div class="form-group col-md-3">
                    <label for="oral_mark">Oral Mark</label>
                    <input type="number" name="oral_mark" class="form-control" id="oral_mark" onkeyup="sum()">
                </div>

                <div class="form-group col-md-3">
                    <label for="t1_mark">T1 Mark</label>
                    <input type="number" name="t1_mark" class="form-control" id="t1_mark" onkeyup="sum()">
                </div>

                <div class="form-group col-md-3">
                    <label for="t2_mark">T2 Mark</label>
                    <input type="number" name="t2_mark" class="form-control" id="t2_mark" onkeyup="sum()">
                </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary" id="btn">Submit</button>
            </div>
        </form>
    </div>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title text-bold">Sections</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <table id="table2" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Subject Name</th>
                        <th>Class</th>
                        <th>Wr-or-t1-t2</th>
                        <th>Full Marks</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($subject))
                    @foreach($subject as $v)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $v->subject_name }}</td>
                        <td>{{ $v->ClassName->class_name }}</td>
                        <td>{{ $v->written_mark }} - {{  $v->oral_mark }} - {{  $v->t1_mark }} - {{  $v->t2_mark }}</td>
                        <td>{{ $v->written_mark +  $v->oral_mark +  $v->t1_mark +  $v->t2_mark }}</td>
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
<script>
function sum(){ //failed
    var w=parseInt( $('#written_mark').val() );
    var o=parseInt($('#oral_mark').val());
    var t1=parseInt($('#t1_mark').val());
    var t2=parseInt($('#t2_mark').val());
    $('#total_mark').val(w +  o + t1 + t2);
}
</script>
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
