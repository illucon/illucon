@extends('admin.master')

@section('title', 'Student List')


@section('main-content')    


@push('css')     <!-- additional css-->


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
            <h3 class="box-title text-bold">Add new Grade</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{ url('/add-grade') }}" method="post" role="form">
            {{ csrf_field() }}
            <div class="box-body" id="add_grade_form">

                <div class="form-group col-md-4">
                    <label for="marks_from">Marks From</label>
                    <input type="number" name="marks_from" class="form-control" id="marks_from" placeholder="(Example 80)">
                </div>

                <div class="form-group col-md-4">
                    <label for="marks_to">Marks To</label>
                    <input type="number" name="marks_to" class="form-control" id="marks_to" placeholder="(Example 100)">
                </div>

                <div class="form-group col-md-4">
                    <label for="grade">Grade</label>
                    <input type="text" name="grade" class="form-control" id="grade" placeholder="(Example A+)">
                </div>

                <div class="form-group col-md-4">
                    <label for="grade_point">Grade Point</label>
                    <input type="text" name="grade_point" class="form-control" id="grade_point" placeholder="(Example 5.00)">
                </div>

                <div class="form-group col-md-4">
                    <label for="remark">Remark</label>
                    <input type="text" name="remark" class="form-control" id="remark" placeholder="(Example Excellent!! CarryOn)">
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
            <h3 class="box-title text-bold">Grade Point Setting</h3>
        </div>
        <!-- /.box-header --><div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tr>
                    <th>SN</th>
                    <th>From(%)</th>
                    <th>To(%)</th>
                    <th>Grade</th>
                    <th>Point</th>
                    <th>Remark</th>
                    <th>Action(inactive)</th>
                </tr>
                @if($grade)
                @foreach($grade as $v)
                <tr>
                    <td>SN</td>
                    <td>{{ $v->marks_from }}</td>
                    <td>{{ $v->marks_to }}</td>
                    <td>{{ $v->grade }}</td>
                    <td>{{ $v->grade_point }}</td>
                    <td>{{ $v->remark }}</td>
                    <td>
                        <a class="btn btn-default" onclick="ajax_edit_view('{{ $v->id }}', '{{ url("/ajax-edit-grade-".$v->id) }}')"><span data-toggle="tooltip" data-placement="top" title="edit" class="glyphicon glyphicon-edit"></span></a>

                        <a class="btn btn-default" href="{{url('/delete-grade-'.$v->id)}}" onclick="return confirm('Are you sure to delete this ?')"><span data-toggle="tooltip" data-placement="top" title="delete" class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
                @endforeach
                @endif
            </table>
        </div>
        <!-- /.box-body -->

    </div>


</div>


<!--End Main Content-->
@push('scripts')  <!-- additional Script-->
<script>

    function ajax_edit_view(id, link)
    {
        $('#add_grade').removeClass("box-primary");
        $('#btn').removeClass("btn-primary");
        $('#add_grade').addClass("box-warning");
        $('#btn').addClass("btn-warning");
        
//        $('#edit_grade_view').html($('#add_grade_form').html());
////    $.ajax({
////    url: link,
////            type:"GET",
////            data: {"id":id},
////            success: function(result){
////            $(des).html(result.res);
////            $(des).html(result.res);
////            $(des).html(result.res);
////            $(des).html(result.res);
////            $(des).html(result.res);
////            }
////    });
    };
</script>
@endpush<!-- End additional Script-->
@endsection
