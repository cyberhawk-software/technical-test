<?php

namespace App\Services;

use Illuminate\Support\Carbon;
use Illuminate\Validation\UnauthorizedException;

class AuthService
{
    public function login($request): array
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            throw new UnauthorizedException('Unauthorized');
        }

        $validate = Carbon::now()
            ->add('1 hour')
            ->toDateTimeString();

        return ['token' => $token, 'expiresIn' => $validate];
    }
}
