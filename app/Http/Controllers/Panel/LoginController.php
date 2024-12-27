<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
	public function create()
	{
		return view('panel.auth.login');
	}

    public function registerPage()
    {
        return view('panel.auth.register');
    }

    public function storeRegistration(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:6|max:8|confirmed',
            'role' => 'required|string|in:admin,content-manager',
        ]);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        Auth::guard('panel')->login($user);

        return redirect()->route('panel.home');
    }


    public function store(AdminLoginRequest $request)
	{
		$request->authenticate();

		$request->session()->regenerate();

		return to_route('panel.home');
	}


	public function destroy(Request $request)
	{
		Auth::guard('panel')->logout();

		$request->session()->invalidate();

		$request->session()->regenerateToken();

		return to_route('panel.home');
	}
}
