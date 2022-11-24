<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'primer_nombre' => ['required', 'string', 'max:255'],
            'segundo_nombre' => ['required', 'string', 'max:255'],
            'primer_apellido' => ['required', 'string', 'max:255'],
            'segundo_apellido' => ['required', 'string', 'max:255'],
            'ci' => ['required', 'numeric','unique:users'],
            'tipo_de_usuario' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'sexo' => ['required', 'string', 'max:255'],
            'municipio' => ['required', 'string', 'max:255'],
            'provincia' => ['required', 'string', 'max:255'],
            'color_piel' => ['required', 'string', 'max:255'],
            'telefono_casa' => ['required', 'string', 'max:255'],
            'telefono_uci' => ['required', 'string', 'max:255'],
            'celular' => ['required', 'string', 'max:255'],
            'solapin' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'primer_nombre' => $data['primer_nombre'],
            'segundo_nombre' => $data['segundo_nombre'],
            'primer_apellido' => $data['primer_apellido'],
            'segundo_apellido' => $data['segundo_apellido'],
            'ci' => $data['ci'],
            'tipo_de_usuario' => $data['tipo_de_usuario'],
            'username' => $data['username'],
            'email' => $data['email'],
            'sexo' => $data['sexo'],
            'municipio' => $data['municipio'],
            'provincia' => $data['provincia'],
            'color_piel' => $data['color_piel'],
            'telefono_casa' => $data['telefono_casa'],
            'telefono_uci' => $data['telefono_uci'],
            'celular' => $data['celular'],
            'solapin' => $data['solapin'],
            'password' => Hash::make($data['password']),
        ])->assignRole('Usuario');
    }
    
}