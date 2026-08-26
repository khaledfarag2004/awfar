<?php

namespace App\Services\Auth;

use App\Repositories\Auth\AuthRepository;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    protected $authRepo;
    public function __construct(AuthRepository $authRepo)
    {
        $this->authRepo = $authRepo;
    }
    public function register(array $data)
    {

        $user = $this->authRepo->createUser([
            'name'     => $data['name'],
            'phone'    => $data['phone'],
            'email'    => $data['email'] ?? null,
            'city_id'  => $data['city_id'],
            'type'     => $data['type'],
            'country_code' => $data['country_code'],
            'password' => Hash::make($data['password']),
        ]);

        $otp = rand(1000, 9999);

        $user->update([
            'otp'            => $otp,
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        return $user;
    }

    public function login($phone, $password)
    {
        $phone = '+966' . $phone;
        $user = $this->authRepo->findByPhone($phone);

        if ($user && Hash::check($password, $user->password)) {
            $token = $user->createToken('authToken')->plainTextToken;
            return ['user' => $user, 'token' => $token];
        }
        return null;
    }
}
