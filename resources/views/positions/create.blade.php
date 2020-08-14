@extends('layouts.app')

@section('title', 'Add Position')

@section('content')
    <section class="content">
        @if ($errors->any())
            <div class="card-header">
                @include('components.validation_errors')
            </div>
        @endif

        {!! Form::open([
                    'method' => 'STORE',
                    'url' => route('positions.store'),
                    'role' => 'form',
                    'files' => true,
                    'id' => 'editform'
                    ]) !!}

        @include('positions.form', [
            'titleText' => 'Add Position',
            'submitButtonText' => 'Add',
            'back' =>  route('positions.index'),
        ])

        {!! Form::close() !!}
    </section>
@endsection

