<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        //1. Validate the Email Ra Password
        $validator =  Validator::make($request->only('email', 'password'), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if($validator->fails()) {

            return  redirect()->back()->withErrors($validator)->withInput();

        }

        //2. Check for email in database
        $user = User::where("email", $request->email)->first();

        if(!$user) {
            return  redirect()->back()->withErrors(['email' => 'The email was not found.'])->withInput();
        }

        //3. Check if the passowrd entere match the password in the database
        $passwordMatch = Hash::check($request->password, $user->password);

        if(!$passwordMatch) {
            return  redirect()->back()->withErrors(['password' => 'The password was incorrect.'])->withInput();

        }
        



        //4 .Login 
        Auth::login($user);

        if($user->role == 'superadmin'){
            return redirect()->route('admin');
        }
        else{
            return redirect()->route('user');
        }

        


        //5. Redirect
        // return redirect('/home');

    }
    
}