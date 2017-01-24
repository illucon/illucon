@foreach($class_to_exam_name as $v)
<option value="{{$v->id}}">{{$v->exam_name}}</option>
@endforeach