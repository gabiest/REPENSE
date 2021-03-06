<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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
            'birth_date' => ['required', 'date'],
            'cpf' => ['required', 'numeric', 'unique:users'],
            'email' => ['required', 'email', 'max:100'],
            'address' => ['required', 'string', 'max:255'],
            'address_number' => ['required'],
            'zipcode' => ['required', 'numeric', 'min:8'],
            'state' => ['required'],
            'phone' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8']
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
        return User::create([
            'name' => $data['name'],
            'birth_date' => $data['birth_date'],
            'cpf' =>  $data['cpf'],
            'email' => $data['email'],
            'address' => $data['address'],
            'address_number' => $data['address_number'],
            'address_complement' => $data['address_complement'],
            'zipcode' => $data['zipcode'],
            'state' => $data['state'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }





    // protected function registered(Request $request, $user)
    // {
    //     // Mail::to($user->email)->send(new UserRegisteredEmail($user));


    //     if($user->role == 'ROLE_USER' && session()->has('cart'))
    //     {
    //         return redirect()->route('checkout.index');
    //     }
    //     else
    //     {
    //         return redirect()->route('home');
    //     }

    //     return null;
    // }

    protected function registered(Request $request, $user)
    { {

            if (session()->has('cart')) {
                return redirect()->route('checkout.index');
            }
            return null;
        }
    }
}
