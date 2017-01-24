@extends('admin.master')

@section('title', 'Student List')


@section('main-content')    


@push('css')     <!-- additional css-->
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{asset('public/admin_assets')}}/plugins/datepicker/datepicker3.css">
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
            <h3 class="box-title text-bold"> New Mark Entry</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{ url('/mark-entry-by-class') }}" method="post" role="form">
            {{ csrf_field() }}
            <div class="box-body" id="add_grade_form">


                <div class="form-group col-md-4">
                    <label for="academic_years_id">Year</label>
                    <select name="academic_years_id" class="form-control" id="academic_years_id">
                        @foreach($academic_year as $v)
                        <option value="{{$v->id}}">{{$v->academic_year}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="class_names_id">Class</label>
                    <select name="class_names_id" class="form-control" id="exam_type" onchange="ajax_view_option(this.value, '{{ url("/ajax-view-section") }}', '#section_names_id', '#subjects_id', '#exam_names_id')" >
                        @foreach($class_name as $v)
                        <option value="{{$v->id}}">{{$v->class_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="section_names_id">Section</label>
                    <select name="section_names_id" class="form-control" id="section_names_id">

                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="subjects_id">Subject</label>
                    <select name="subjects_id" class="form-control" id="subjects_id">

                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="exam_names_id">Exam Name</label>
                    <select name="exam_names_id" class="form-control" id="exam_names_id">
                        <option value="" disabled selected >Select Exam Name</option>
                    </select>
                </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <input type="submit" class="btn btn-primary" id="btn" value="Submit"/>
            </div>
        </form>
    </div>


    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title text-bold">Exams List</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <div class="col-md-8 text-bold">
                <table class="table">
                    <tr>
                        <td>Class</td>
                        <td>Six</td>
                        <td>Exam Name</td>
                        <td>Six</td>
                    </tr>
                    <tr>
                        <td>Subject</td>
                        <td>Six</td>                        
                        <td>Year</td>
                        <td>Six</td>
                    </tr>
                </table>
            </div>
            <form action="" method="post">{{ csrf_field() }}
                <table class="table table-hover table-striped">
                    <tr>
                        <th>SN</th>
                        <th>Roll</th>
                        <th>Student Name</th>
                        <th>Written Mark</th>
                        <th>Oral Mark</th>
                        <th>T1 Mark</th>
                        <th>T2 Mark</th>
                    </tr>
                    @if(isset($exam_name))
                    @foreach($exam_name as $v)
                    <tr>
                        <td>SN</td>
                        <td>{{ $v->exam_name }}</td>
                        <td>{{ $v->ExamType->exam_type }}</td>
                        <td>{{ $v->ClassName->class_name }}</td>
                        <td>{{ $v->AcademicYear->academic_year }}</td>
                        <td>{{ $v->status }}</td>
                        <td>{{ $v->status }}</td>
                    </tr>
                    @endforeach
                    @endif
                </table>
            </form>
        </div>
        <!-- /.box-body -->

    </div>


</div>


<!--End Main Content-->
@push('scripts')  <!-- additional Script-->

<script>
    function ajax_view_option(id, link, location1, location2, location3) {
    $.ajax({
    url: link,
            type:"GET",
            data: {"id":id},
            success: function(result){
            console.log(result);
            $(location1).html(result.res1);
            $(location2).html(result.res2);
            $(location3).html(result.res3);
            }
    });
    }
</script>
<!-- bootstrap datepicker -->
<script src="{{asset('public/admin_assets')}}/plugins/datepicker/bootstrap-datepicker.js"></script>
<script>
    $(function () {
//Date picker
    $('#class_start_from').datepicker({
    autoclose: true
    });
    $('#class_end_to').datepicker({
    autoclose: true
    });
    });
</script>
@endpush<!-- End additional Script-->
@endsection
