@extends('layouts.main')

@section('title', 'Users')

@section('content')
    <div class="container mt-5">
        <h1>{{$user->name}}</h1>
    </div>
    <div class="container mt-5">
        <h3>{{$user->email}}</h3>
        <h3>{{__('Role:') . $user->role ? $user->role->name : 'guest'}}</h3>    </div>
    </div>
@endsection

