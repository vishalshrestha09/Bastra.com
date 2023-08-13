<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PasswordController extends Controller
{
    /**
     * Summary of checkpassword
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function checkpassword(Request $request)
    {
        $user = Auth::user();
        $validator =  \Illuminate\Support\Facades\Validator::make($request->only('current_password', 'new_password', 'password_confirmation'), [
            'current_password' => ['required', 'string', 'min:8'],
            'new_password' => ['required', 'string', 'min:4'],
            'password_confirmation' => ['required', 'string', 'min:4', 'same:new_password'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $passwordMatch = Hash::check($request->current_password, $user->password);


        if (!$passwordMatch) {
            return redirect()->back()->withErrors(['password' => 'The current password is incorrect.'])->withInput();
        }

        $user->update(['password' => bcrypt($request->new_password)]);
        return redirect()->back()->with("status", "Password changed successfully!"); //SESSION
    }

    public function index(Request $request)
    {
        return view('passwords.index');
    }
}
