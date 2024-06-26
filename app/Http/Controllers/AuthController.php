<?php

namespace App\Http\Controllers;

use App\Events\UserRegisteredEvent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function storeLogin(Request $request)
    {

        try {
            $user = User::query()
                ->where('email', $request->get('email'))
                ->firstOrFail(); // gui ve exception

            // boi vi seeder da hash password
            if (Hash::check($request->get('password'), $user->password)) {
                session()->put('id', $user->id);
                session()->put('name', $user->name);
                session()->put('avatar', $user->avatar);
                session()->put('role', $user->role);

                return redirect()->route('students.index');
            } else {
                return redirect()->route('auth.login')->with('error', 'unknown your email or password !');
            }

        } catch (\Throwable $e) {
            dd($e);
            return redirect()->route('auth.login')->with('error', 'Something went wrong !');
        }
    }


    public function register()
    {
        return view('auth.register');
    }

    public function storeRegister(Request $request)
    {
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => 0,
        ]);
        UserRegisteredEvent::dispatch($user); //dispatch day vao job (queue)
        return redirect()->route('students.index');
    }

    public function logout()
    {
        session()->flush(); // xoa tat ca
        return redirect()->route('auth.login');
    }

}
