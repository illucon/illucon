@extends('admin.master')

@section('title', 'Student List')


@section('main-content')    


@push('css')     <!-- additional css-->
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('public/admin_assets')}}/plugins/datatables/dataTables.bootstrap.css">
@endpush         <!-- end additional css-->


<!--Start main Content-->

<div class="row">
    <div class="callout callout-success">
        <h2 class="text-center">Student List</h2>
    </div>    
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Total Students : {{ $students->count() }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="view2" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>SID</th>
                            <th>Roll</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Group</th>
                            <th>Section</th>
                            <th>Class</th>
                            <th>Year</th>
                            <th>Status</th>
                            <th>Account</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $v)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $v->sid }}</td>
                            <td>{{-- $v->sid --}}Roll</td>
                            <td>{{ $v->first_name . ' '. $v->last_name }}</td>
                            <td>{{ $v->gender }}</td>
                            <td>{{ $v->group }}</td>
                            <td>{{ $v->section }}</td>
                            <td>{{ $v->ClassName->class_name }}</td>
                            <td>{{ $v->academic_year }}</td>
                            <td>{{-- $v->status --}}Status</td>
                            <td><a href="{{ url('/student-acount/'.$v->id) }}">Account</a></td>
                            <td><a href="{{ url('/student-details/'.$v->id) }}">Details</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>SN</th>
                            <th>SID</th>
                            <th>Roll</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Group</th>
                            <th>Section</th>
                            <th>Class</th>
                            <th>Year</th>
                            <th>Status</th>
                            <th>Account</th>
                            <th>Details</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <span>{{ $students->links() }}</span>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>              
</div>


<!--End Main Content-->
@push('scripts')  <!-- additional Script-->
<!-- DataTables -->
<script src="{{asset('public/admin_assets')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public/admin_assets')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#view1").DataTable();
    $('#view2').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": true
    });
  });
</script>
@endpush            <!-- End additional Script-->
@endsection
