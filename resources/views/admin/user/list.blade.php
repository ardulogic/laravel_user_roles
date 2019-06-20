@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <h1>{{__('Users')}}</h1>
        <div class="row mt-4">
            @if(($users))
                <div class="table-responsive">
                    <table>
                        <caption class="text-center">An example of a responsive table based on <a
                                href="https://getbootstrap.com/css/#tables-responsive" target="_blank">Bootstrap</a>:
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
                                <td>
                                    <a class="btn btn-sm btn-success" href="{{route('users.show', $user->id)}}"></a>
                                    <a class="btn btn-sm btn-success" href="{{route('users.create')}}"></a>
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

