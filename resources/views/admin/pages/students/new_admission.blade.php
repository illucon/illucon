@extends('admin.master')

@section('title', 'New Admission')


@section('main-content')


@push('css')
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{asset('public/admin_assets')}}/plugins/datepicker/datepicker3.css">
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('public/admin_assets')}}/plugins/select2/select2.min.css">
@endpush

@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(Session('success'))
<div class="callout callout-success">
    <h4>{{ Session('success') }}</h4>
</div>
@endif


<div class="row">
    <form action="{{url('/save-student')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <!--first part-->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title text-bold text-success text-center">Students Basic Info</h3>
                    </div>
                    <div class="box-body">
                        <!--first column-->
                        <div class="col-md-6">

                            <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label class="control-label" for="first_name">First Name *
                                    @if ($errors->has('first_name'))
                                    <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; {{ $errors->first('first_name') }}
                                    @endif
                                </label>
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required>
                            </div>

                            <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label class="control-label" for="last_name">Last Name *
                                    @if ($errors->has('last_name'))
                                    <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; {{ $errors->first('last_name') }}
                                    @endif
                                </label>
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required>
                            </div>

                            <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                                <div class="radio">
                                    <b>Gender *</b>
                                    <label>
                                        @if ($errors->has('gender'))
                                        <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; {{ $errors->first('gender') }}
                                        @endif
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" id="gender" value="male"  required>
                                        Male
                                    </label>
                                    <label>
                                        <input type="radio" name="gender" id="gender" value="female"  required>
                                        Female
                                    </label>
                                </div>
                            </div>


                            <div class="form-group  {{ $errors->has('dob') ? ' has-error' : '' }}">
                                <label>Date of birth *:
                                    @if ($errors->has('dob'))
                                    <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; {{ $errors->first('dob') }}
                                    @endif
                                </label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="dob" name="dob"  required>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label" for="birth_certificate">Birth Certificate
                                    <i class="fa fa-times-circle-o"></i>Error
                                </label>
                                <input type="text" class="form-control" id="birth_certificate" name="birth_certificate" placeholder="Birth Certificate">
                            </div>

                            <div class="form-group {{ $errors->has('blood_group') ? ' has-error' : '' }}">
                                <label>Blood Group *
                                    @if ($errors->has('blood_group'))
                                    <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; {{ $errors->first('blood_group') }}
                                    @endif
                                </label>
                                <select class="form-control select2" name="blood_group" style="width: 100%;"  required>
                                    <option></option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                            </div>

                            <div class="form-group {{ $errors->has('group') ? ' has-error' : '' }}">
                                <div class="radio">
                                    <b>Group *</b>
                                    <label>
                                        @if ($errors->has('group'))
                                        <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; {{ $errors->first('group') }}
                                        @endif
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="group" id="group" value="general" checked  required>
                                        General
                                    </label>
                                    <label>
                                        <input type="radio" name="group" id="group" value="science" disabled>
                                        Science
                                    </label>
                                    <label>
                                        <input type="radio" name="group" id="group" value="arts" disabled>
                                        Arts
                                    </label>
                                    <label>
                                        <input type="radio" name="group" id="group" value="commerce" disabled>
                                        Commerce
                                    </label>
                                </div>
                            </div>


                            <div class="form-group {{ $errors->has('religion') ? ' has-error' : '' }}">
                                <div class="radio">
                                    <b>Religion * </b>
                                    <label>
                                        @if ($errors->has('religion'))
                                        <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; {{ $errors->first('religion') }}
                                        @endif
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="religion" id="religion" value="islam"  required>
                                        Islam
                                    </label>
                                    <label>
                                        <input type="radio" name="religion" id="religion" value="hinduism"  required>
                                        Hinduism
                                    </label>
                                    <label>
                                        <input type="radio" name="religion" id="religion" value="christianity"  required>
                                        Christianity 
                                    </label>
                                    <label>
                                        <input type="radio" name="religion" id="religion" value="other"  required>
                                        Other
                                    </label>
                                </div>
                            </div>


                        </div>
                        <!--end first column-->
                        <!--second column-->
                        <div class="col-md-6">

                            <div class="form-group {{ $errors->has('class_names_id') ? ' has-error' : '' }}">
                                <label>Class *
                                    @if ($errors->has('class'))
                                    <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; {{ $errors->first('class_names_id') }}
                                    @endif
                                </label>
                                <select class="form-control" name="class_names_id" style="width: 100%;" onchange="ajax_view_option(this.value, '{{ url("/ajax-view-section") }}', '#section')" required>
                                    @foreach($class_name as $v)
                                    <option value="{{$v->id}}">{{$v->class_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group {{ $errors->has('section') ? ' has-error' : '' }}">
                                <label>Section *
                                    @if ($errors->has('section'))
                                    <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; {{ $errors->first('section') }}
                                    @endif
                                </label>
                                <select class="form-control select2" name="section" id="section" style="width: 100%;" required>

                                </select>
                            </div>

                            <div class="form-group {{ $errors->has('academic_year') ? ' has-error' : '' }}">
                                <label>Academic Year *
                                    @if ($errors->has('academic_year'))
                                    <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; {{ $errors->first('academic_year') }}
                                    @endif
                                </label>
                                <select class="form-control select2" name="academic_year" style="width: 100%;"  required>
                                    @foreach($academic_year as $v)
                                    <option value="{{$v->academic_year}}">{{$v->academic_year}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group ">
                                <label class="control-label" for="last_school">
                                    Last School
                                </label>
                                <input type="text" class="form-control" id="last_school" name="last_school" placeholder="Last School">
                            </div>

                            <div class="form-group">
                                <div class="radio">
                                    <b>Transport </b>
                                    <label>
                                        <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; Error
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="transport" id="transport" value="0" checked>
                                        Guardian Oun
                                    </label>
                                    <label>
                                        <input type="radio" name="transport" id="transport" value="1" disabled>
                                        School Micro
                                    </label>
                                    <label>
                                        <input type="radio" name="transport" id="transport" value="2" disabled>
                                        School Van
                                    </label>
                                </div>
                            </div>



                            <div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
                                <label for="image">
                                    Image
                                    @if ($errors->has('image'))
                                    <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; {{ $errors->first('image') }}
                                    @endif
                                </label>
                                <input type="file" id="image" name="image" accept="image/*">

                                <p class="help-block">Size should be less than 1 MB </p>
                            </div>


                        </div>
                        <!--end second column-->

                    </div>

                </div>
            </div>
        </div>
        <!--end first part-->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title text-bold text-success text-center">Parents Info</h3>
                    </div>
                    <div class="box-body">
                        <!--first column-->
                        <div class="col-md-6">

                            <div class="form-group {{ $errors->has('father_name') ? ' has-error' : '' }}">
                                <label class="control-label" for="father_name">
                                    Father's Name *
                                    @if ($errors->has('father_name'))
                                    <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; {{ $errors->first('father_name') }}
                                    @endif
                                </label>
                                <input type="text" name="father_name" class="form-control" id="father_name" placeholder="Father's Name ..." required>
                            </div>

                            <div class="form-group {{ $errors->has('father_education') ? ' has-error' : '' }}">
                                <label class="control-label" for="father_education">
                                    Father's Education *
                                    @if ($errors->has('father_education'))
                                    <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; {{ $errors->first('father_education') }}
                                    @endif
                                </label>
                                <input type="text" class="form-control" id="father_education" name="father_education" placeholder="Father's Education ..." required>
                            </div>

                            <div class="form-group {{ $errors->has('father_occupation') ? ' has-error' : '' }}">
                                <label class="control-label" for="father_occupation">
                                    Father's Occupation *
                                    @if ($errors->has('father_occupation'))
                                    <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; {{ $errors->first('father_occupation') }}
                                    @endif
                                </label>
                                <input type="text" class="form-control" id="father_occupation" name="father_occupation" placeholder="Father's Occupation ..." required>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="father_nid">
                                    Father's NID 
                                    <i class="fa fa-times-circle-o"></i>Error
                                </label>
                                <input type="text" class="form-control" id="father_nid" name="father_nid" placeholder="Father's NID ...">
                            </div>

                            <div class="form-group {{ $errors->has('father_phone') ? ' has-error' : '' }}">
                                <label class="control-label" for="father_phone">
                                    Father's Phone Number *
                                    @if ($errors->has('father_phone'))
                                    <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; {{ $errors->first('father_phone') }}
                                    @endif
                                </label>
                                <input type="text" class="form-control" id="father_phone" name="father_phone" placeholder="Father's Phone No ..." required>
                            </div>

                            <div class="form-group {{ $errors->has('father_email') ? ' has-error' : '' }}">
                                <label class="control-label" for="father_email">
                                    Father's Email 
                                    @if ($errors->has('father_email'))
                                    <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; {{ $errors->first('father_email') }}
                                    @endif
                                </label>
                                <input type="email" class="form-control" id="father_email" name="father_email" placeholder="Father's Email ...">
                            </div>

                        </div>
                        <!--end first column-->
                        <!--second column-->

                        <div class="col-md-6">

                            <div class="form-group {{ $errors->has('mother_name') ? ' has-error' : '' }}">
                                <label class="control-label" for="mother_name">
                                    Mother's Name *
                                    @if ($errors->has('mother_name'))
                                    <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; {{ $errors->first('mother_name') }}
                                    @endif
                                </label>
                                <input type="text" name="mother_name" class="form-control" id="mother_name" placeholder="Mother's Name ..." required>
                            </div>

                            <div class="form-group ">
                                <label class="control-label" for="mother_education">
                                    Mother's Education 
                                    <i class="fa fa-times-circle-o"></i>Error
                                </label>
                                <input type="text" class="form-control" id="mother_education" name="mother_education" placeholder="Mother's Education ...">
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="mother_occupation">
                                    Mother's Occupation 
                                    <i class="fa fa-times-circle-o"></i>Error
                                </label>
                                <input type="text" class="form-control" id="mother_occupation" name="mother_occupation" placeholder="Mother's Occupation ...">
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="mother_nid">
                                    Mother's NID 
                                    <i class="fa fa-times-circle-o"></i>Error
                                </label>
                                <input type="text" class="form-control" id="mother_nid" name="mother_nid" placeholder="Mother's NID ...">
                            </div>

                            <div class="form-group ">
                                <label class="control-label" for="mother_phone">
                                    Mother's Phone Number 
                                    <i class="fa fa-times-circle-o"></i>Error
                                </label>
                                <input type="text" class="form-control" id="mother_phone" name="mother_phone" placeholder="Mother's Phone No ...">
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="mother_email">
                                    Mother's Email 
                                    <i class="fa fa-times-circle-o"></i>Error
                                </label>
                                <input type="email" class="form-control" id="mother_email" name="mother_email" placeholder="Mother's Email ...">
                            </div>

                        </div>
                        <!--end second column-->

                    </div>

                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title text-bold text-success text-center">Guardian Info</h3>
                    </div>
                    <div class="box-body">
                        <!--first column-->
                        <div class="col-md-6">

                            <div class="form-group {{ $errors->has('guardian_name') ? ' has-error' : '' }}">
                                <label class="control-label" for="guardian_name">
                                    Guardian's Name *
                                    @if ($errors->has('guardian_name'))
                                    <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; {{ $errors->first('guardian_name') }}
                                    @endif
                                </label>
                                <input type="text" name="guardian_name" class="form-control" id="guardian_name" placeholder="Guardian's Name ..." required>
                            </div>

                            <div class="form-group {{ $errors->has('guardian_email') ? ' has-error' : '' }}">
                                <label class="control-label" for="guardian_email">
                                    Guardian's Email 
                                    @if ($errors->has('guardian_email'))
                                    <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; {{ $errors->first('guardian_email') }}
                                    @endif
                                </label>
                                <input type="email" class="form-control" id="guardian_email" name="guardian_email" placeholder="Guardian's Email ...">
                            </div>

                        </div>
                        <!--end first column-->
                        <!--second column-->

                        <div class="col-md-6">

                            <div class="form-group {{ $errors->has('relation') ? ' has-error' : '' }}">
                                <label class="control-label" for="relation">
                                    Relation with Student *
                                    @if ($errors->has('relation'))
                                    <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; {{ $errors->first('relation') }}
                                    @endif
                                </label>
                                <input type="text" name="relation" class="form-control" id="relation" placeholder="Relation with Student ..." required>
                            </div>

                            <div class="form-group {{ $errors->has('guardian_phone') ? ' has-error' : '' }}">
                                <label class="control-label" for="guardian_phone">
                                    Guardian's Phone No *
                                    @if ($errors->has('guardian_phone'))
                                    <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; {{ $errors->first('guardian_phone') }}
                                    @endif
                                </label>
                                <input type="text" class="form-control" id="guardian_email" name="guardian_phone" placeholder="Guardian's Phone No ..." required>
                            </div>

                        </div>
                        <!--end second column-->

                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title text-bold text-success text-center">Address Info</h3>
                    </div>
                    <div class="box-body">
                        <!--first column-->
                        <div class="col-md-6">

                            <div class="form-group {{ $errors->has('present_address') ? ' has-error' : '' }}">
                                <label>
                                    Present Address *
                                    @if ($errors->has('present_address'))
                                    <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; {{ $errors->first('present_address') }}
                                    @endif
                                </label>
                                <textarea class="form-control" id="present_address" name="present_address" rows="3" placeholder="Enter Present Address..." required></textarea>
                            </div>

                            <div class="form-group {{ $errors->has('present_city') ? ' has-error' : '' }}">
                                <label class="control-label" for="present_city">
                                    Present City/Thana/Union *
                                    @if ($errors->has('present_city'))
                                    <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; {{ $errors->first('present_city') }}
                                    @endif
                                </label>
                                <input type="text" name="present_city" class="form-control" id="present_city" placeholder="Present City/Thana/Union ..." required>
                            </div>

                            <div class="form-group {{ $errors->has('present_district') ? ' has-error' : '' }}">
                                <label>Present District *
                                    @if ($errors->has('present_district'))
                                    <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; {{ $errors->first('present_district') }}
                                    @endif
                                </label>
                                <select class="form-control select2" id="present_district" name="present_district" style="width: 100%;"  required>
                                    <option></option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Bagerhat">Bagerhat </option>
                                    <option value="Bandarban">Bandarban </option>
                                    <option value="Barguna">Barguna </option>
                                    <option value="Barisal">Barisal </option>
                                    <option value="Bhola">Bhola </option>
                                    <option value="Bogra">Bogra </option>
                                    <option value="Brahmanbaria">Brahmanbaria </option>
                                    <option value="Chandpur">Chandpur </option>
                                    <option value="Chapainawabganj">Chapainawabganj </option>
                                    <option value="Chittagong">Chittagong </option>
                                    <option value="Chuadanga">Chuadanga </option>
                                    <option value="Comilla">Comilla </option>
                                    <option value="Coxs Bazar">Coxs Bazar </option>
                                    <option value="Dhaka">Dhaka </option>
                                    <option value="Dinajpur">Dinajpur </option>
                                    <option value="Faridpur">Faridpur </option>
                                    <option value="Feni">Feni </option>
                                    <option value="Gaibandha">Gaibandha </option>
                                    <option value="Gazipur">Gazipur </option>
                                    <option value="Gopalganj">Gopalganj </option>
                                    <option value="Habiganj">Habiganj </option>
                                    <option value="Jamalpur">Jamalpur </option>
                                    <option value="Jessore">Jessore </option>
                                    <option value="Jhalokati">Jhalokati </option>
                                    <option value="Jhenaidah">Jhenaidah </option>
                                    <option value="Joypurhat">Joypurhat </option>
                                    <option value="Khagrachhari">Khagrachhari </option>
                                    <option value="Khulna">Khulna </option>
                                    <option value="Kishoreganj">Kishoreganj </option>
                                    <option value="Kurigram">Kurigram </option>
                                    <option value="Kushtia">Kushtia </option>
                                    <option value="Lakshmipur">Lakshmipur </option>
                                    <option value="Lalmonirhat">Lalmonirhat </option>
                                    <option value="Madaripur">Madaripur </option>
                                    <option value="Magura">Magura </option>
                                    <option value="Manikganj">Manikganj </option>
                                    <option value="Meherpur">Meherpur </option>
                                    <option value="Moulvibazar">Moulvibazar </option>
                                    <option value="Munshiganj">Munshiganj </option>
                                    <option value="Mymensingh">Mymensingh </option>
                                    <option value="Naogaon">Naogaon </option>
                                    <option value="Narail">Narail </option>
                                    <option value="Narayanganj">Narayanganj </option>
                                    <option value="Narsingdi">Narsingdi </option>
                                    <option value="Natore">Natore </option>
                                    <option value="Netrakona">Netrakona </option>
                                    <option value="Nilphamari">Nilphamari </option>
                                    <option value="Noakhali">Noakhali </option>
                                    <option value="Pabna">Pabna </option>
                                    <option value="Panchagarh">Panchagarh </option>
                                    <option value="Patuakhali">Patuakhali </option>
                                    <option value="Pirojpur">Pirojpur </option>
                                    <option value="Rajbari">Rajbari </option>
                                    <option value="Rajshahi">Rajshahi </option>
                                    <option value="Rangamati">Rangamati </option>
                                    <option value="Rangpur">Rangpur </option>
                                    <option value="Satkhira">Satkhira </option>
                                    <option value="Shariatpur">Shariatpur </option>
                                    <option value="Sherpur">Sherpur </option>
                                    <option value="Sirajganj">Sirajganj </option>
                                    <option value="Sunamganj">Sunamganj </option>
                                    <option value="Sylhet">Sylhet </option>
                                    <option value="Tangail">Tangail </option>
                                    <option value="Thakurgaon">Thakurgaon </option>
                                </select>
                            </div>

                        </div>
                        <!--end first column-->
                        <!--second column-->

                        <div class="col-md-6">

                            <div class="form-group {{ $errors->has('permanent_address') ? ' has-error' : '' }}">
                                <label>
                                    Permanent Address *
                                    @if ($errors->has('permanent_address'))
                                    <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; {{ $errors->first('permanent_address') }}
                                    @endif
                                </label><span class="label label-default pull-right" id="same_address">same</span>
                                <textarea class="form-control"  id="permanent_address" name="permanent_address" rows="3" placeholder="Enter Permanent Address..." required></textarea>
                            </div>

                            <div class="form-group {{ $errors->has('permanent_city') ? ' has-error' : '' }}">
                                <label class="control-label" for="permanent_city">
                                    Permanent City/Thana/Union *
                                    @if ($errors->has('permanent_city'))
                                    <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; {{ $errors->first('permanent_city') }}
                                    @endif
                                </label>
                                <input type="text" id="permanent_city" name="permanent_city" class="form-control" placeholder=" Permanent City/Thana/Union ..." required>
                            </div>

                            <div class="form-group {{ $errors->has('permanent_district') ? ' has-error' : '' }}">
                                <label>Permanent District *
                                    @if ($errors->has('permanent_district'))
                                    <i class="fa fa-times-circle-o"></i>  &nbsp;&nbsp;&nbsp;&nbsp; {{ $errors->first('permanent_district') }}
                                    @endif
                                </label>
                                <select class="form-control select2" id="permanent_district" name="permanent_district" style="width: 100%;"  required>
                                    <option></option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Bagerhat">Bagerhat </option>
                                    <option value="Bandarban">Bandarban </option>
                                    <option value="Barguna">Barguna </option>
                                    <option value="Barisal">Barisal </option>
                                    <option value="Bhola">Bhola </option>
                                    <option value="Bogra">Bogra </option>
                                    <option value="Brahmanbaria">Brahmanbaria </option>
                                    <option value="Chandpur">Chandpur </option>
                                    <option value="Chapainawabganj">Chapainawabganj </option>
                                    <option value="Chittagong">Chittagong </option>
                                    <option value="Chuadanga">Chuadanga </option>
                                    <option value="Comilla">Comilla </option>
                                    <option value="Coxs Bazar">Coxs Bazar </option>
                                    <option value="Dhaka">Dhaka </option>
                                    <option value="Dinajpur">Dinajpur </option>
                                    <option value="Faridpur">Faridpur </option>
                                    <option value="Feni">Feni </option>
                                    <option value="Gaibandha">Gaibandha </option>
                                    <option value="Gazipur">Gazipur </option>
                                    <option value="Gopalganj">Gopalganj </option>
                                    <option value="Habiganj">Habiganj </option>
                                    <option value="Jamalpur">Jamalpur </option>
                                    <option value="Jessore">Jessore </option>
                                    <option value="Jhalokati">Jhalokati </option>
                                    <option value="Jhenaidah">Jhenaidah </option>
                                    <option value="Joypurhat">Joypurhat </option>
                                    <option value="Khagrachhari">Khagrachhari </option>
                                    <option value="Khulna">Khulna </option>
                                    <option value="Kishoreganj">Kishoreganj </option>
                                    <option value="Kurigram">Kurigram </option>
                                    <option value="Kushtia">Kushtia </option>
                                    <option value="Lakshmipur">Lakshmipur </option>
                                    <option value="Lalmonirhat">Lalmonirhat </option>
                                    <option value="Madaripur">Madaripur </option>
                                    <option value="Magura">Magura </option>
                                    <option value="Manikganj">Manikganj </option>
                                    <option value="Meherpur">Meherpur </option>
                                    <option value="Moulvibazar">Moulvibazar </option>
                                    <option value="Munshiganj">Munshiganj </option>
                                    <option value="Mymensingh">Mymensingh </option>
                                    <option value="Naogaon">Naogaon </option>
                                    <option value="Narail">Narail </option>
                                    <option value="Narayanganj">Narayanganj </option>
                                    <option value="Narsingdi">Narsingdi </option>
                                    <option value="Natore">Natore </option>
                                    <option value="Netrakona">Netrakona </option>
                                    <option value="Nilphamari">Nilphamari </option>
                                    <option value="Noakhali">Noakhali </option>
                                    <option value="Pabna">Pabna </option>
                                    <option value="Panchagarh">Panchagarh </option>
                                    <option value="Patuakhali">Patuakhali </option>
                                    <option value="Pirojpur">Pirojpur </option>
                                    <option value="Rajbari">Rajbari </option>
                                    <option value="Rajshahi">Rajshahi </option>
                                    <option value="Rangamati">Rangamati </option>
                                    <option value="Rangpur">Rangpur </option>
                                    <option value="Satkhira">Satkhira </option>
                                    <option value="Shariatpur">Shariatpur </option>
                                    <option value="Sherpur">Sherpur </option>
                                    <option value="Sirajganj">Sirajganj </option>
                                    <option value="Sunamganj">Sunamganj </option>
                                    <option value="Sylhet">Sylhet </option>
                                    <option value="Tangail">Tangail </option>
                                    <option value="Thakurgaon">Thakurgaon </option>
                                </select>
                            </div>

                        </div>
                        <!--end second column-->

                    </div>

                </div>
            </div>
        </div>

        <!--submit button-->
        <div class="text-center">
            <button type="submit" name="new_admission" class="btn btn-success">New Admission</button>
            <button type="reset" name="new_admission" class="btn btn-warning">Reset</button>
        </div>

    </form>
</div>



@push('scripts')
<script>
    function ajax_view_option(id, link, location1) {
    $.ajax({
    url: link,
            type:"GET",
            data: {"id":id},
            success: function(result){
            console.log(result);
            $(location1).html(result.res1);
            }
    });
    }
</script>
<!-- Select2 -->
<script src="{{asset('public/admin_assets')}}/plugins/select2/select2.full.min.js"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('public/admin_assets')}}/plugins/datepicker/bootstrap-datepicker.js"></script>
<script>
    $(function () {
//Date picker
    $('#dob').datepicker({
    autoclose: true
    });
    //Initialize Select2 Elements
    $(".select2").select2();
    });</script>
<script>
    $(document).ready(function () {
    $("#same_address").click(function () {
    $("#permanent_address").val($("#present_address").val());
    $("#permanent_city").val($("#present_city").val());
    $dist = $("#present_district").val();
    $("#permanent_district").val($dist).change();
    });
//present_address present_city present_district permanent_address permanent_city permanent_district
    });

</script>

@endpush
@endsection
