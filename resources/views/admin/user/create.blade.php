@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        @component('components.form.form', $form)
        @endcomponent
    </div>
@endsection

