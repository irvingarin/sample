<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    protected $profileRecord;
    protected $userRecord;

    public function __construct(Profile $profile, User $user)
    {
        $this->profileRecord = $profile;
        $this->userRecord = $user;
    }

    public function create()
    {
        return view('auth.profile');
    }
    public function store(ProfileRequest $request)
    {
        
        $this->profileRecord->createProfileRecord($request);
        $this->userRecord->updateStatus($request, 'Active');
        return redirect(route('dashboard'));
    }
}
