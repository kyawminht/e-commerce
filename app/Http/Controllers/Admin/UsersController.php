<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class UsersController extends Controller
{
    public function index()
    {
        $users=User::paginate(10);
        return view('admin.user.index',compact('users'));
    }

    public function create()
    {

        return view('admin.user.create');
    }
    public function store(UsersRequest $request)
    {
        $validatedData = $request->validated();

        User::create([
            'name'=>$validatedData['name'],
            'email'=>$validatedData['email'],
            'password'=>Hash::make($validatedData['password']),
            'role_as'=>$validatedData['role_as'],

        ]);

        return redirect('/admin/users')->with('message', 'User added successfully');

    }
    public function edit($userId)
    {
        $user=User::find($userId);
        return view('admin.user.edit',compact('user'));
    }

    public function update(UsersRequest $request,$userId)
    {
        $validatedData = $request->validated();

        User::findOrFail($userId)->update([
            'name'=>$validatedData['name'],
            'email'=>$validatedData['email'],
            'password'=>Hash::make($validatedData['password']),
            'role_as'=>$validatedData['role_as'],

        ]);

        return redirect('/admin/users')->with('message', 'User updated successfully');
    }

    public function destroy($userId)
    {
        User::findOrFail($userId)->delete();
        return redirect('/admin/users')->with('message', 'User deleted successfully');
    }
}
