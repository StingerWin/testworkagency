<section class="content-header">
    <div class="container-fluid">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-edit"></i>
                    {{$titleText}}
                </h3>
            </div>

            <div class="card-body">
                <div class="form-group {{ $errors->has('name') ? ' has-error' : ''}}">
                    <label for="name">Name</label>
                    {!! Form::text('name', null, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control', 'id' => 'name', 'placeholder' => 'Enter name', 'required']) !!}
                    <div class="row">
                        <div class="col-11">
                            {!! $errors->first('name', '<p class="help-block"><small style="color:red">:message</small></p>') !!}
                        </div>
                        <div class="col-1">
                            <div class="block-right">
                                <span id="keyupChars">0</span>/256
                            </div>
                        </div>
                    </div>
                </div>

                @isset($position)
                    <div class="row">
                        <div class="col-6">
                            <p><label for="date">Created at: <i>{{ $position->created_at->format('d.m.Y') }}</i></label>
                            </p>
                            <p><label for="date">Updated at: <i>{{ $position->updated_at->format('d.m.Y') }}</i></label>
                            </p>
                        </div>
                        <div class="col-6">
                            <p><label for="date">Admin created ID: <i>{{ $position->created_user_id }}</i></label></p>
                            <p><label for="date">Admin updated ID: <i>{{ $position->updated_user_id }}</i></label></p>
                        </div>
                    </div>
                @endisset

                <a href="{{ $back }}" class="btn btn-default" title="Back">Back</a>
                <button type="submit" class="btn btn-primary">{{$submitButtonText}}</button>

                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

@section('styles')
    <style>
        .block-right {
            float: right;
            color: silver;
        }
    </style>
@endsection

@section('scripts')
    <script>
        $(function () {
            $('#name').keyup(function () {
                let count = $('#name').val().length;
                $('#keyupChars').html(count);
            });
        });
    </script>
@endsection
