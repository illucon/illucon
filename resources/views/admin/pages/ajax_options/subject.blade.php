@foreach($class_to_subject as $v)
<option value="{{$v->id}}">{{$v->subject_name}}</option>
@endforeach