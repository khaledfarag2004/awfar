<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\ForgetPasswordRequest;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Requests\Api\Auth\ResendOtpRequest;
use App\Http\Requests\Api\Auth\ResetPasswordRequest;
use App\Http\Requests\Api\Auth\VerifyOtpRequest;
use App\Servce\Auth\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;
use App\Models\User;

class AuthController extends Controller
{
    protected $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function login(LoginRequest $request)
    {
        $request->validated();

        $login = $this->authService->login($request->phone, $request->password);

        if ($login) {
            return response()->json([
                'status' => true,
                'message' => 'Logged in successfully',
                'token' => $login['token'],
                'data' => new UserResource($login['user']),
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Invalid credentials',
        ], 401);
    }
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = $this->authService->register($data);

        $user->load(['country', 'city']);

        return response()->json([
            'status' => true,
            'message' => 'Successfully created user!',
            'data' => new UserResource($user),
        ], 201);
    }
    public function verifyOtp(VerifyOtpRequest $request)
    {
        $request->validated();

        $user = User::find($request->user_id);

        if ($user && $user->otp === $request->otp && $user->otp_expires_at > now()) {
            $user->update([
                'email_verified_at' => now(),
                'otp' => null,
                'otp_expires_at' => null,
                'verified' => true,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Email verified successfully!'
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Invalid or expired OTP'
        ], 400);
    }
    public function resendOtp(ResendOtpRequest $request)
    {
        $request->validated();

        $user = User::find($request->user_id);

        $otp = rand(1000, 9999);

        $user->update([
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
        ]);
        return response()->json([
            'status' => true,
            'message' => 'OTP resent successfully!'
        ]);
    }
    public function forgetPassword(ForgetPasswordRequest $request)
    {
        $request->validated();
        $user = User::where('phone', $request->phone)->first();
        $otp = rand(1000, 9999);
        $user->update([
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
        ]);
        return response()->json([
            'status' => true,
            'message' => 'OTP sent successfully'
        ]);
    }
    public function resetPassword(ResetPasswordRequest $request)
    {
        $request->validated();
        $user = User::where('phone', $request->phone)->first();
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ], 404);
        }
        $user->update([
            'password' => Hash::make($request->password),
            'otp' => null,
            'otp_expires_at' => null
        ]);

        return response()->json(['status' => true, 'message' => 'Password reset successfully']);
    }
}
