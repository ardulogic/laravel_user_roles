<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Role;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin');
    }

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

    public function form() {
        return [
            'action' => 'Admin\UserController@store',
            'method' => 'POST',
            'fields' => [
                'name' => [
                    'type' => 'input',
                    'label' => 'Name',
                    'value' => '',
                    'attr' => ['placeholder' => 'Title']
                ],
                'email' => [
                    'type' => 'input',
                    'label' => 'Email',
                    'value' => '',
                    'attr' => ['placeholder' => 'Email']
                ],
                'password' => [
                    'type' => 'password',
                    'label' => 'Password',
                    'value' => '',
                    'attr' => ['placeholder' => 'Password']
                ],
                'role' => [
                    'type' => 'select',
                    'label' => 'Role',
                    'options' => Role::pluck('name', 'id'),
                    'attr' => []
                ],
                'save' => [
                    'type' => 'button',
                    'title' => 'Save',
                    'attr' => ''
                ]
            ]
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create', [
            'form' => $this->form()
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

        $role = Role::findOrFail($request->input('role'));
        $user->role()->associate($role);
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
        $user = User::findOrFail($id);

        return view('admin.user.view', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        $form = $this->form();
        $form['action'] = ['Admin\UserController@update', $id];
        $form['method'] = 'PUT';
        $form['fields']['name']['value'] = $user->name;
        $form['fields']['email']['value'] = $user->email;
        $form['fields']['role']['value'] = $user->role->name;

        return view('admin.user.edit', [
            'form' => $form,
            'user' => $user
        ]);
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->input('password')) {
            $user->password = $request->input('password');
        }

        $role = Role::findOrFail($request->input('role'));
        $user->role()->associate($role);
        $user->save();

        return redirect('/users')->with(['success' => 'User has been updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/users')->with(['success' => 'User has been deleted!']);
    }
}
