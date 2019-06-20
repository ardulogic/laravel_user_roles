@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <h1>{{__('Edit User: ') . $user->name}}</h1>

        <div class="row mt-4">
            @component('components.form.form', $form)
            @endcomponent
        </div>
    </div>
@endsection

