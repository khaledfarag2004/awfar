<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Users\CreateUserRequest;
use App\Http\Requests\Dashboard\Users\UpdateUserRequest;
use App\Models\City;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $UserCount = User::with('city')->count();
        $ActiveUserCount = User::where('is_active', 1)->count();
        $PendingUserCount = User::where('is_active', 0)->count();
        $BlocedUserCount = User::where('is_blocked', 1)->count();
        $users = User::with('city')->paginate(10);
        return view('dashboard.users.index', compact('UserCount', 'ActiveUserCount', 'PendingUserCount', 'BlocedUserCount', 'users'));
    }
    public function create()
    {
        $cities = City::all();
        return view('dashboard.users.create', compact('cities'));
    }
    public function store(CreateUserRequest $request){
        $data = $request->validated();
        User::create($data);
        return redirect()->route('user.index')->with('success', 'User created successfully');
    }
    public function show($id)
    {
        $user = User::with('city')->findOrFail($id);
        return view('dashboard.users.show', compact('user'));
    }
    public function edit($id){

        $user = User::findOrFail($id);
        $cities = City::all();
        return view('dashboard.users.edit', compact('user', 'cities'));
    }
    public function update(UpdateUserRequest $request,User $user){
        $data = $request->validated();
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }
        $user->update($data);
        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }
}
