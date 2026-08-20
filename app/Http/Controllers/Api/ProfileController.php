<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProfileResource;
use App\Models\User;
use App\Servce\ProfileService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $profileService;
    public function __construct(ProfileService $profileService){
        $this->profileService = $profileService;
    }
    public function showProfile(int $id)
    {
        $data = $this->profileService->getProfile($id);
        return response()->json([
            'success' => true,
            'message' => 'بيانات البروفايل المطلوب',
            'data' => ProfileResource::make($data),
        ]);
    }
    public function update(UpdateProfileRequest $request, $id)
    {
        $user = $this->profileService->updateProfile($id, $request->all());

        return response()->json([
            'status'  => true,
            'message' => 'تم تعديل الحساب بنجاح',
            'data'    => new ProfileResource($user),
        ]);
    }
    public function changePassword(UpdatePasswordRequest $request, $id)
    {
        $data = $request->validated();

        $user = $this->profileService->changePassword($id, $data);

        return response()->json([
            'status'  => true,
            'message' => 'تم تغير كلمة المرور بنجاح',
            'data'    => new ProfileResource($user),
        ]);
    }
}
