<?php
namespace App\Repositories;


use App\Models\Banner;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileRepository{
    public function updateProfile(int $id, array $data)
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }
    public function getProfile(int $id)
    {
        return User::with('city')->findOrFail($id);
    }
    public function changePassword(int $id, array $data)
    {
        $user = User::findOrFail($id);

        if (!Hash::check($data['current_password'], $user->password)) {
            throw new \Exception('Current password is incorrect');
        }

        $user->update([
            'password' => Hash::make($data['new_password']),
        ]);

        return $user;
    }
}
