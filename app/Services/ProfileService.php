<?php
namespace App\Services;

use App\Models\User;
use App\Repositories\ProfileRepository;

class ProfileService{
    protected $profileRepo;
    public function __construct(ProfileRepository $profileRepo){
        $this->profileRepo = $profileRepo;
    }
    public function updateProfile(int $id, array $data)
    {
        return $this->profileRepo->updateProfile($id, $data);
    }
    public function getProfile(int $id)
    {
        return $this->profileRepo->getProfile($id);
    }
    public function changePassword(int $id, array $data)
    {
        return $this->profileRepo->changePassword($id, $data);
    }

}
