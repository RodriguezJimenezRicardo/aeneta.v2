<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserToken;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class UserAccessController extends Controller
{
    public function loginForm()
    {
        return view('access.login');
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email'     => 'required|email',
                'password'  => 'required'
            ],
            [
                'email.required'    => 'El email es requerido.',
                'password.required' => 'La contraseña es requerida.'
            ]
        );

        $id_user = sha1(strtolower($request->email));

        try {
            $user = User::findOrFail($id_user);
        } catch (ModelNotFoundException $e) {
            return badRequest('Email no encontrado');
        }

        if (!Hash::check($request->password, $user->password)) {
            return badRequest('Contraseña incorrecta');
        }

        Auth::login($user);

        session(['user' => $user]);

        $token = new UserToken();

        $token->token = sha1(microtime(true));
        $token->dt_exp = Carbon::now()->addHours(2);
        $token->id_user = $user->id_user;

        $token->save();
        //buscar docente o profesor con id

        return redirect()->route('admin.index');
    }

    public function registerForm()
    {
        return view('access.register');
    }

    public function register(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email|max:150|unique:Users',
                'password' => 'required|min:8|confirmed'
            ],
            [
                'email.required'    => 'El email es requerido.',
                'email.max'         => 'El email no debe ser maximo de 150 caracteres',
                'email.unique'      => 'El email ya existe',
                'password.required' => 'La contraseña es requerida.',
                'password.min'      => 'La contraseña debe tener minimo a 8 caracteres'
            ]
        );

        $user = new User();

        $user->id_user = sha1($request->email);
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->rol = 'Administrador';

        $user->save();

        $token = new UserToken();

        $token->token = sha1(microtime(true));
        $token->dt_exp = Carbon::now()->addHours(4);
        $token->id_user = $user->id_user;

        $token->save();

        Auth::login($user);
        session(['user' => $user]);

        return redirect()->route('admin.index');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        UserToken::where('token', $request->user_token)->delete();
        return redirect('/');
    }
}
