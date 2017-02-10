<?php

namespace App\Http\Controllers;

use App\Http\Requests\LogInRequest;
use App\Http\Requests\SignUpRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function show_signup()
    {
        return view('pages.signup');
    }

    public function signUpUser(SignUpRequest $request)
    {
        $user = new User([
            'user_id' => str_random(6),
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'address' => $request->address,
            'email' => $request->email,
            'birthday' => $request->bday,
            'gender' => $request->gender,
            'phone' => $request->phone
        ]);

        if ($user->save()) {
            // log in the user after signing up and put info to session in order to order food
            Auth::login($user);
            Session::put('firstName', $user->first_name);
            Session::put('lastName', $user->last_name);
            Session::put('address', $user->address);
            Session::put('email', $user->email);

            $info = [
                'user_id' => $user['user_id'],
                'username' => $user['username'],
                'password' => $request->password
            ];
            return view('pages.signupSuccess', compact('info'));
        } else {
            return view('pages.signup');
        }
    }

    public function show_login()
    {
        return view('pages.login');
    }

    public function logInUser(LogInRequest $request)
    {
        $login = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_id'; // determine key
        $request->merge([$login => $request->input('login')]);

        if (Auth::attempt($request->only($login, 'password'), $request->remember)) {
            $user = Auth::User(); // get currently authenticated user
            Session::put('firstName', $user->first_name);
            Session::put('lastName', $user->last_name);
            Session::put('address', $user->address);
            Session::put('email', $user->email);

            return redirect()->route('order.menu');
        } else {
            $error = [];
            if (User::where($login, $request->login)->first()) {
                $error['password'] = 'Password incorrect';
            } else {
                $error['login'] = 'Username or email incorrect';
            }
            return redirect()->back()->with(['login' => $request->login])->withErrors($error);
//            return view('pages.login')->with(['login' => $request->login])->withErrors($error);
        }
    }

    public function logOutUser()
    {
        Auth::logout();
        Session::forget('firstName');
        Session::forget('lastName');
        Session::forget('address');
        Session::forget('email');
        return redirect()->route('order.menu');
    }
}
