<form action="{{route($route.'.destroy', $data)}}" class="btn-icon-wrapper"
      method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="delete"/>
    <a class="btn btn-icon btn-success"
       href="{{route($route.'.edit', $data)}}"><i class="far fa-edit"></i></a>
    <button type="submit"
            class="btn btn-icon btn-danger"
            onclick='return confirm("Are you sure you want to remove {{ substr($route,0,-1) }} {{ $data->name }}?")'><i class="fas fa-trash-alt"></i>
    </button>
</form>
