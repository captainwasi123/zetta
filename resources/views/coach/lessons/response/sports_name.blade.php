<option value="">Select</option>
@foreach ($sports as $val)
   <option value="{{$val->id}}">{{$val->name}}</option>
@endforeach