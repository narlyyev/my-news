<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('panel.profile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string|min:6|max:8|confirmed',
        ]);

        $user = Auth::guard('panel')->user();

        if ($request->username !== $user->username) {
            return redirect()->back()->withErrors(['username' => 'The username is incorrect.']);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('panel.profile.show')->with('success', 'Password updated successfully.');
    }
}
