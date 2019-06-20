@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <h1>{{__('Create User')}}</h1>

        <div class="row mt-4">
            @component('components.form.form', $form)
            @endcomponent
        </div>
    </div>
@endsection

