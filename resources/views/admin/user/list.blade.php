@extends('layouts.main')

@section('title', 'Users')

@section('content')
    <div class="container mt-5">
        <h1>{{__('Users')}}</h1>
        <div class="row mt-4">
            @if(($users))
                <div class="table-responsive">
                    <table>
                        <caption class="text-center">
                            <a class="btn btn-sm btn-success" href="{{route('users.create')}}">Create New User!</a>
                        </caption>
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role ? $user->role->name : 'guest'}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-success" href="{{route('users.show', $user->id)}}">View</a>
                                        <a class="btn btn-sm btn-success" href="{{route('users.edit', $user->id)}}">Edit</a>

                                        @component('components.form.one-button-form', [
                                            'action' => ['Admin\UserController@destroy', $user->id],
                                            'method' => 'DELETE',
                                            'title' => 'Delete',
                                            'attr' => ['class' => 'btn btn-sm btn-danger']
                                        ])
                                        @endcomponent
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection

