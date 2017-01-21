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
            <h3 class="box-title text-bold">Add New Exam</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{ url('/add-new-exam') }}" method="post" role="form">
            {{ csrf_field() }}
            <div class="box-body" id="add_grade_form">

                <div class="form-group col-md-4">
                    <label for="exam_name">Exam Name</label>
                    <input type="text" name="exam_name" class="form-control" id="exam_name" placeholder="(Ex: 3rd Semister Final)">
                </div>

                <div class="form-group col-md-4">
                    <label for="exam_type">Exam Type</label>
                    <select name="exam_types_id" class="form-control" id="exam_type">
                        @foreach($exam_type as $v)
                        <option value="{{$v->id}}">{{$v->exam_type}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="percentage_for_final">Percentage For Final</label>
                    <div class="input-group">
                        <input type="text" name="percentage_for_final" class="form-control" id="percentage_for_final" placeholder="Ex: 70">
                        <span class="input-group-addon">%</span>
                    </div>
                </div>

                <div class="form-group col-md-4">
                    <label for="class_start_from">Start Date</label>
                    <input type="text" name="class_start_from" class="form-control" id="class_start_from">
                </div>

                <div class="form-group col-md-4">
                    <label for="class_end_to">End Date</label>
                    <input type="text" name="class_end_to" class="form-control" id="class_end_to">
                </div>

                <div class="form-group col-md-4">
                    <label for="exam_name">Total Classes</label>
                    <input type="number" name="total_classes" class="form-control" id="total_classes">
                </div>

                <div class="form-group col-md-4">
                    <label for="class_names_id">Class</label>
                    <select name="class_names_id" class="form-control" id="class_names_id">
                        @foreach($class_name as $v)
                        <option value="{{$v->id}}">{{$v->class_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="academic_years_id">Academic Year</label>
                    <select name="academic_years_id" class="form-control" id="academic_years_id">
                        @foreach($academic_year as $v)
                        <option value="{{$v->id}}">{{$v->academic_year}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="status">Status</label><br/>
                    <label class="radio-inline">
                        <input type="radio" name="status" id="status" value="running" checked/>Running
                    </label>               
                    <label class="radio-inline">
                        <input type="radio" name="status" id="status" value="completed"/>Completed
                    </label>               
                    <label class="radio-inline">
                        <input type="radio" name="status" id="status" value="upcoming"/>Upcoming
                    </label>               
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
            <h3 class="box-title text-bold">Exams List</h3>
        </div>
        <!-- /.box-header --><div class="box-body table-responsive no-padding">
            <table class="table table-hover table-striped">
                <tr>
                    <th>SN</th>
                    <th>Exam Name</th>
                    <th>Exam Type</th>
                    <th>Class</th>
                    <th>Year</th>
                    <th>Status</th>
                    <th>Action(inactive)</th>
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
                    <td>
                        <label cla class="label label-primarys">details</label>
                        <a class="btn btn-default"><span data-toggle="tooltip" data-placement="top" title="edit" class="glyphicon glyphicon-edit"></span></a>

                        <a class="btn btn-default" href="" onclick="return confirm('Are you sure to delete this ?')"><span data-toggle="tooltip" data-placement="top" title="delete" class="glyphicon glyphicon-trash"></span></a>
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
