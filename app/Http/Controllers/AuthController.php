<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Validation\Auth\LoginRequest;
use App\Http\Resources\Auth\LoginResource;
use App\Http\Validation\Auth\RegisterRequest;
use App\Repositories\Interfaces\UserInterface;

class AuthController extends Controller
{
    private $repository;

    public function __construct(UserInterface $repository)
    {
        $this->repository = $repository;
    }

    public function login(LoginRequest $request) {
        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];

        $authenticatedUser = null;
        if (Auth::attempt($credentials)) {
            $authenticatedUser = Auth::user();
        }

        if (!$authenticatedUser) {
            abort(
                401,
                'Login failed. Either the email or password is wrong.'
            );
        }

        return new LoginResource($authenticatedUser);
    }

    public function register(RegisterRequest $request) {
        $request->merge([
            'password' => bcrypt($request['password']),
            'username' => strtolower(trim($request['username'])),
        ]);

        $user = $this->repository->create($request->all());

        return response()->json([
            'message' => 'Register Success',
            'data' => $user,
        ], 201);
    }

    public function logout() {
        Auth::user()->token()->revoke();
        return response()->json(['message' => 'Logout Success']);
    }

    public function userToken() {
        return new LoginResource(Auth::user());
    }


}
