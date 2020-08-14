@extends('layouts.app')

@section('title', 'Add Employee')

@section('content')
    <section class="content">
        @if ($errors->any())
            <div class="card-header">
                @include('components.validation_errors')
            </div>
        @endif

        {!! Form::open([
                    'method' => 'STORE',
                    'url' => route('employees.store'),
                    'role' => 'form',
                    'files' => true,
                    'id' => 'editform'
                    ]) !!}

        @include('employees.form', [
            'titleText' => 'Add Employees',
            'submitButtonText' => 'Add',
            'back' =>  route('employees.index'),
        ])

        {!! Form::close() !!}
    </section>
@endsection

