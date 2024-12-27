<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('panel.users.index', compact('users'));
    }

    public function create()
    {
        $roles = ['admin', 'content-manager'];

        return view('panel.users.form', compact('roles'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|max:8|confirmed',
            'role' => 'required|string|max:255',
        ]);

        if ($request->password) {
            $data['password'] = bcrypt($data['password']);
        }

        User::create($data);

        return to_route('panel.users.index');
    }

    public function edit(User $user)
    {
        $roles = ['admin', 'content-manager'];

        return view('panel.users.form', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|max:8|confirmed',
            'role' => 'required|string|max:255',
        ]);

        if ($request->password) {
            $data['password'] = bcrypt($data['password']);
        }

        $user->update($data);

        return to_route('panel.users.index');
    }

    public function destroy(User $user)
    {
        if ($user->id == auth()->user()->id) {
            return back();
        }

        $user->delete();

        return to_route('panel.users.index');
    }
}
