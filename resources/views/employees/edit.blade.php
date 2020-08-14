@extends('layouts.app')

@section('title', 'Edit employee')

@section('content')

    @if ($errors->any())
        <div class="card-header">
            @include('components.validation_errors')
        </div>
    @endif


    {!! Form::model($modelValues, [
                 'method' => 'PATCH',
                 'url' => route('employees.update', $employee),
                 'role' => 'form',
                 'files' => true,
                 'id' => 'editform'
                 ]) !!}

    @include('employees.form', [
        'titleText' => 'Edit employee',
        'submitButtonText' => 'Update',
        'back' => route('employees.index'),
    ])

    {!! Form::close() !!}

@endsection
