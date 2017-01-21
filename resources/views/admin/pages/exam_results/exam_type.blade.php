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
            <h3 class="box-title text-bold">Add Exam Type</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form action="{{ url('/add-exam_type') }}" method="post" role="form">
            {{ csrf_field() }}
            <div class="box-body" id="add_grade_form">

                <div class="form-group col-md-4">
                    <label for="exam_type">Exam Type</label>
                    <input type="text" name="exam_type" class="form-control" id="exam_type" placeholder="(Ex: Semister Exam)">
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
            <h3 class="box-title text-bold">Available Exam Types</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover table-striped">
                <tr>
                    <th>SN</th>
                    <th>Exam Type</th>
                    <th>Action(inactive)</th>
                </tr>
                @if($exam_type)
                @foreach($exam_type as $v)
                <tr>
                    <td>SN</td>
                    <td>{{ $v->exam_type }}</td>
                    <td>
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


@endpush<!-- End additional Script-->
@endsection
