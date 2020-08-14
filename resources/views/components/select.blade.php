@foreach($employees as $name_position => $optgroup)
    <optgroup label="{{ $name_position }}">
        @foreach($optgroup as $id_employee => $name_employee)
            <option value="{{ $id_employee }}">{{ $name_employee }}</option>
        @endforeach
    </optgroup>
@endforeach
