<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\UnauthenticatedException;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * @param LoginRequest $request
     * @throws UnauthenticatedException
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email');
        $credentials = $credentials + ['status' => User::APPROVED, 'is_admin' => false];

        $user = User::query()
            ->where($credentials)
            ->first();

        if(empty($user) || !Hash::check($request->password, $user->password))
            throw new UnauthenticatedException();

        /** @var User $user */
        \auth()->setUser($user);

        if(empty(auth()->user()->api_token)) {
            $token = base64_encode(Str::random(191));

            auth()->user()->update([
                'api_token' => $token
            ]);
        }

        return response()->json([
            'token'     => \auth()->user()->api_token ?? $token,
            'message'   => 'success'
        ], 200);
    }


    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws UnauthenticatedException
     */
    public function loginAdmin(LoginRequest $request)
    {
        $credentials = $request->only('email');
        $credentials = $credentials + ['status' => User::APPROVED, 'is_admin' => true];

        $user = User::query()
            ->where($credentials)
            ->first();

        if(empty($user) || !Hash::check($request->password, $user->password))
            throw new UnauthenticatedException();

        /** @var User $user */
        \auth()->setUser($user);

        if(empty(auth()->user()->api_token)) {
            $token = base64_encode(Str::random(191));

            auth()->user()->update([
                'api_token' => $token
            ]);
        }

        return response()->json([
            'token'     => \auth()->user()->api_token ?? $token,
            'message'   => 'success'
        ], 200);
    }

    /**
     * @param RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        /** @var array $data */
        $data = $request->only(['name', 'surname', 'email', 'phone', 'gender']);
        /** @var Carbon $date */
        $date = Carbon::createFromFormat('M j Y', $request->date_of_birth);
        $data = array_merge($data, [
            'month' => $date->format('M'),
            'day'   => $date->day,
            'year'  => $date->year
        ]);

        User::query()->create($data);

        return response()->json(['message' => 'success'], 201);
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(['user' => \auth()->user()->only(['name', 'surname'])]);
    }
}
