<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UpdatePasswordRequest;
use App\Http\Requests\Api\UpdateProfileRequest;
use App\Http\Resources\ProfileResource;
use Illuminate\Http\Request;
use App\Services\ProfileService;

class ProfileController extends Controller
{
    protected $profileService;
    public function __construct(ProfileService $profileService){
        $this->profileService = $profileService;
    }
    public function showProfile(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'success' => true,
            'message' => 'بيانات البروفايل الخاص بك',
            'data'    => new ProfileResource($user),
        ]);
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = $request->user();
        $user->update($request->validated());

        return response()->json([
            'status'  => true,
            'message' => 'تم تعديل الحساب بنجاح',
            'data'    => new ProfileResource($user),
        ]);
    }

    public function changePassword(UpdatePasswordRequest $request)
    {
        $user = $request->user();
        $data = $request->validated();
        if (!\Hash::check($data['current_password'], $user->password)) {
            return response()->json([
                'status'  => false,
                'message' => 'كلمة المرور الحالية غير صحيحة.',
            ], 403);
        }
        $user->update([
            'password' => bcrypt($data['password']),
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'تم تغيير كلمة المرور بنجاح',
            'data'    => new ProfileResource($user),
        ]);
    }

}
