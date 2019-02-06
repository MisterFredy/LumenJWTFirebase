<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use Validator;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;


class AuthController extends Controller
{
     /**
     * The request instance.
     *
     * @var \Illuminate\Http\Request
     */
    private $request;
    //Users $user;
    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function jwt($user) {
        $payload = [
            'iss' => "lumen-jwt", // Issuer of the token
            'sub' => $user, // Subject of the token
            'iat' => time(), // Time when JWT was issued.
            'exp' => time() + 60*60 // Expiration time
        ];
        // As you can see we are passing `JWT_SECRET` as the second parameter that will
        // be used to decode the token in the future.
        return JWT::encode($payload, env('JWT_SECRET'));
    }

    public function authenticate(Users $user) {
        $this->validate($this->request, [
            'email'     => 'required|email',
            'password'  => 'required'
        ]);
        // Find the user by email
        $email = $this->request->input('email');
        $user = Users::login($email);
        if (!$user) {
            return response()->json([
                'error' => 'Email does not exist.'
            ], 400);
        }
        // Verify the password and generate the token
        if (Hash::check($this->request->input('password'), $user->password)) {
            return response()->json([
                'token' => $this->jwt($user->iduser)
            ], 200);
        }
        //return $user->password;
        // Bad Request response
        return response()->json([
            'error' => 'Email or password is wrong.'
        ], 400);
    }
    /**
     * Create a new token.
     *
     * @param  \App\User   $user
     * @return string
     */
   
    /**
     * Authenticate a user and return the token if the provided credentials are correct.
     *
     * @param  \App\User   $user
     * @return mixed
     */
}
