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
                        <td>: {{ $class->class_name }}</td>
                        <!--<input type="hidden" name="class_names_id"  value="{{$class->id}}"/>-->
                        <td>Exam Name </td>
                        <td>: {{ $exam_name->exam_name }}</td>
                        <td>Section</td>
                        <td>:  {{$section->section_name}}</td>
                    </tr>
                    <tr>
                        <td>Subject</td>
                        <td>: {{ $subject->subject_name }}</td>
                        <!--<input type="hidden" name="subjects_id"  value="{{$subject->id}}"/>-->
                        <td>Year</td>
                        <td>: {{ $year->academic_year }}</td>
                        <!--<input type="hidden" name="academic_years_id"  value="{{$year->id}}"/>-->
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
            <form action="{{url('/save-mark-entry-by-class')}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="exam_names_id"  value="{{$exam_name->id}}"/>
                <input type="hidden" name="subjects_id"  value="{{$subject->id}}"/>
                
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
                    <?php $i = 0; ?>
                    @if(isset($students))
                    @foreach($students as $v)
                    <tr>
                        <td>SN</td>
                        <td>Roll</td>
                        <td>{{ $v->first_name}} {{$v->last_name }}</td>
                    <input type="hidden" name="students_id[]" value="{{ $v->id }}"/>
                    <td><input type="text" name="written_mark[]"/></td>
                    <td><input type="text" name="oral_mark[]"/></td>
                    <td><input type="text" name="t1_mark[]"/></td>
                    <td><input type="text" name="t2_mark[]"/></td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                    @endif
                    <input type="hidden" name="total" value="{{$i}}"/>
                </table>
                <button class="btn btn-success">SUBMIT</button>
            </form>
        </div>
        <!-- /.box-body -->

    </div>


</div>


<!--End Main Content-->
@push('scripts')  <!-- additional Script-->

@endpush<!-- End additional Script-->
@endsection
