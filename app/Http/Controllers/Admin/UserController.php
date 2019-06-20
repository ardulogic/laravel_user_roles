<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.user.list', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form = [
            'action' => 'Admin\UserController@store',
            'method' => 'POST',
            'fields' => [
                [
                    'type' => 'input',
                    'name' => 'name',
                    'label' => 'Name',
                    'value' => '',
                    'attr' => ['placeholder' => 'Title']
                ],
                [
                    'type' => 'input',
                    'name' => 'email',
                    'label' => 'Email',
                    'value' => '',
                    'attr' => ['placeholder' => 'Email']
                ],
                [
                    'type' => 'password',
                    'name' => 'password',
                    'label' => 'Password',
                    'value' => '',
                    'attr' => ['placeholder' => 'Password']
                ],
                [
                    'type' => 'select',
                    'name' => 'role',
                    'label' => 'Role',
                    'options' => Role::pluck('name', 'id'),
                    'attr' => []
                ],
                [
                    'type' => 'button',
                    'title' => 'Save',
                    'attr' => ''
                ]
            ]
        ];

        return view('admin.user.create', [
            'form' => $form
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();

        return redirect('/users')->with(['success' => 'User has been created!']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
