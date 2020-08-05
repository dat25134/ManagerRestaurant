<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image64' => []
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if ($data['image64']==null){
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'image64' => 'data:image/png;base64,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',
            ]);
        }else{
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'image64' => $data['image64'],
            ]);
        }


    }
}
