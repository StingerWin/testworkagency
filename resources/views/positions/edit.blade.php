@extends('layouts.app')

@section('title', 'Edit Position')

@section('content')

    @if ($errors->any())
        <div class="card-header">
            @include('components.validation_errors')
        </div>
    @endif


    {!! Form::model($modelValues, [
                 'method' => 'PATCH',
                 'url' => route('positions.update', $position),
                 'role' => 'form',
                 'files' => true,
                 'id' => 'editform'
                 ]) !!}

    @include('positions.form', [
        'titleText' => 'Edit Position',
        'submitButtonText' => 'Update',
        'back' => route('positions.index'),
    ])

    {!! Form::close() !!}

@endsection
