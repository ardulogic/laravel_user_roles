@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <h1>{{__('User Edit: ')}}</h1>
        <h2>{{ $user->name }}</h2>

        <div class="row mt-4">
           <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
               {{ !! Form::text('title', NULL, ['class' => 'form-control', 'id' => 'title', 'placeholder']) }}
                </div>
            @endif
        </div>
    </div>
@endsection

