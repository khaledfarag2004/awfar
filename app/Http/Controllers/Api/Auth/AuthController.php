<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\ForgetPasswordRequest;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Requests\Api\Auth\ResendOtpRequest;
use App\Http\Requests\Api\Auth\ResetPasswordRequest;
use App\Http\Requests\Api\Auth\VerifyOtpRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Servce\Auth\AuthService;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    protected $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function login(LoginRequest $request)
    {
        $data = $request->validated();

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

        $user->load('city');

        return response()->json([
            'status' => true,
            'message' => 'Successfully created user!',
            'data' => new UserResource($user),
        ], 201);
    }
    public function verifyOtp(VerifyOtpRequest $request)
    {
        $data = $request->validated();

        $user = auth()->user();

        if (!$user) {
            return response()->json(['status' => false, 'message' => 'User not authenticated'], 401);
        }

        if ((string)$user->otp === (string)$data['otp']
            && $user->otp_expires_at
            && now()->lessThan($user->otp_expires_at)) {

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
        $data = $request->validated();
        $data['phone'] = '+966' . $data['phone'];

        $user = User::where('phone', $data['phone'])->first();

        if (!$user) {
            return response()->json(['status' => false, 'message' => 'User not found'], 404);
        }

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
        $data = $request->validated();
        $data['phone'] = '+966' . $data['phone'];

        $user = User::where('phone', $data['phone'])->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ], 404);
        }

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
        $data = $request->validated();

        $user = auth()->user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ], 404);
        }

        $user->update([
            'password' => Hash::make($data['password']),
            'otp' => null,
            'otp_expires_at' => null,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Password reset successfully'
        ]);
    }
}
