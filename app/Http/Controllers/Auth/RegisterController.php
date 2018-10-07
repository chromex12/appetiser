<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;            
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

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
    protected $redirectTo = '/home';

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     */
    protected function create()
    {
        $name = request('name');
        $email = request('email');
        $password = request('password');

        $exist = User::where('email', $email)->exists();
        if ($exist)
            return response()->json([
                'success' => false,
                'message' => 'Duplicate Email'
            ]);

        $id = guid();
        $user = new User();
        $user->id = $id;
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $token = $user->createToken('access_token')->accessToken;
        
        if ($user->save()) {
            return [
                'success' => true,
                'access_token' => $token
            ];
        } 
    }
}
