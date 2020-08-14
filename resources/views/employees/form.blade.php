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
                <div class="form-group {{ $errors->has('photo') ? ' has-error' : ''}}">
                    <span class="input-group-addon"></span>
                    <label for="banner">Photo</label>
                    <div class="fg-line">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                 style="line-height: 150px;">
                                @isset($modelValues['photo'])
                                    <img src="{{$modelValues['photo']}}" alt="">
                                @endisset
                            </div>
                            <div>
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new">Select photo</span>
                                        <span class="fileinput-exists">Edit</span>
                                        {!! Form::file('photo', ['class' => '', 'id' => 'photo', 'accept' => "image/png,image/jpg"]) !!}
                                    </span>
                                <a href="#" class="btn btn-danger fileinput-exists"
                                   data-dismiss="fileinput">Delete</a>
                            </div>
                            <p style="color: silver">
                                File format jpg,png up to 5MB, the minimum size of 300x300px
                            </p>
                        </div>
                    </div>
                    {!! $errors->first('photo', '<p class="help-block"><small style="color:red">:message</small></p>') !!}
                    @isset($modelValues['photo'])
                        <div class="form-group">
                            <div class="icheck-primary d-inline">
                                {!! Form::checkbox('delete_photo',null,null, ['id' => 'checkbox',])!!}
                                <label for="checkbox">Delete photo</label>
                            </div>
                        </div>
                    @endisset
                </div>

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

                <div class="form-group {{ $errors->has('phone_number') ? ' has-error' : ''}}">
                    <label for="phone_number">Phone number</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        {!! Form::text('phone_number', null, ['class' => $errors->has('phone_number') ? 'form-control is-invalid' : 'form-control', 'id' => 'phone_number', 'data-inputmask' => '"mask": "+38 (999) 999-9999"', 'data-mask', 'placeholder' => 'Enter phone number', 'required']) !!}
                    </div>
                    {!! $errors->first('phone_number', '<p class="help-block"><small style="color:red">:message</small></p>') !!}
                </div>

                <div class="form-group {{ $errors->has('email') ? ' has-error' : ''}}">
                    <label for="email">Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        {!! Form::email('email', null, ['class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control', 'id' => 'email', 'placeholder' => 'Enter email', 'required' => 'required']) !!}
                    </div>
                    {!! $errors->first('email', '<p class="help-block"><small style="color:red">:message</small></p>') !!}
                </div>

                <div class="form-group">
                    <label>Position</label>
                    {!! Form::select('position_id', $positions, null, ['class' => $errors->has('position_id') ? 'form-control is-invalid select2' : 'form-control select2']) !!}
                    {!! $errors->first('position_id', '<p class="help-block"><small style="color:red">:message</small></p>') !!}
                </div>

                <div class="form-group {{ $errors->has('salary') ? ' has-error' : ''}}">
                    <label for="salary">Salary, $</label>
                    {!! Form::number('salary', null, ['class' => $errors->has('salary') ? 'form-control is-invalid' : 'form-control', 'id' => 'salary', 'placeholder' => 'Enter salary', 'required' => 'required', 'step' => '0.01']) !!}
                    {!! $errors->first('salary', '<p class="help-block"><small style="color:red">:message</small></p>') !!}
                </div>

                <div class="form-group">
                    <label>Head</label>
                    {!! Form::select('head_id', [], null, ['class' => $errors->has('head_id') ? 'form-control is-invalid select2' : 'form-control select2', 'id' => 'head_id', 'value' => '[{"id":"32660","name":"Aaliyah Jones"}]']) !!}
                    {!! $errors->first('head_id', '<p class="help-block"><small style="color:red">:message</small></p>') !!}
                </div>

                <div class="form-group {{ $errors->has('date') ? ' has-error' : ''}}">
                    <label for="date">Date of employment</label>
                    {!! Form::text('date', null, ['class' => $errors->has('date') ? 'form-control is-invalid' : 'form-control', 'id' => 'date', 'placeholder' => 'Enter phone number', 'required' => 'required']) !!}
                    {!! $errors->first('date', '<p class="help-block"><small style="color:red">:message</small></p>') !!}
                </div>

                @isset($employee)
                    <div class="row">
                        <div class="col-6">
                            <p><label for="date">Created at: <i>{{ $employee->created_at->format('d.m.Y') }}</i></label></p>
                            <p><label for="date">Updated at: <i>{{ $employee->updated_at->format('d.m.Y') }}</i></label></p>
                        </div>
                        <div class="col-6">
                            <p><label for="date">Admin created ID: <i>{{ $employee->created_user_id }}</i></label></p>
                            <p><label for="date">Admin updated ID: <i>{{ $employee->updated_user_id }}</i></label></p>
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
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{URL::asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet"
          href="{{URL::asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
    <!-- File Input -->
    <link rel="stylesheet"
          href="{{URL::asset('assets/css/fileinput.css')}}">

    <style>
        .block-right {
            float: right;
            color: silver;
        }
    </style>
@endsection

@section('scripts')
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{URL::asset('assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
    <!-- InputMask -->
    <script src="{{URL::asset('assets/plugins/moment/moment.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
    <!-- date-range-picker -->
    <script src="{{URL::asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- bootstrap color picker -->
    <script src="{{URL::asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script
        src="{{URL::asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{URL::asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <!-- File Imput -->
    <script src="{{URL::asset('js/fileinput.js')}}"></script>
    <script src="{{URL::asset('js/fileinput.min.js')}}"></script>

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#date').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 2010,
                maxYear: parseInt(moment().format('YYYY'),10),
                locale: {
                    format: 'DD.MM.YYYY'
                }
            });

            $('#name').keyup(function () {
                let count = $('#name').val().length;
                $('#keyupChars').html(count);
            });

            $("#head_id").select2({
                placeholder: 'Head...',
                minimumInputLength: 0,
                allowClear: true,
                ajax: {
                    url: "{{ route('getEmployees') }}",
                    quietMillis: 200,
                    dataType: 'json',
                    data: function(params) {
                        return {
                            term: params.term
                        }
                    },
                    processResults: function (data, page) {
                        let result = $.map(data, function (item) { return { id: item.id, text: item.name }});

                        return { results: result };
                    },
                    cache: true
                },
                initSelection: function (element, callback) {

                    callback({ id: '{{ isset($employee->head) ? $employee->head->id : null }}', text: '{{ isset($employee->head) ? $employee->head->name : null }}' });
                }
            });
        });
    </script>
@endsection
