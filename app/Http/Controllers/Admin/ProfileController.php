<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;
use App\Services\ProfileService;
use Illuminate\Contracts\Auth\Guard;

class ProfileController extends Controller
{
    
    private $service;
    public function __construct(ProfileService $profileService)
    {
        $this->service = $profileService;
//        $this->middleware('auth');
    }

    /**
     * Display the user's profile information.
     */
    public function index()
    {
        $data = $this->service->getAdminProfileData(Auth::user()->id);
        return Inertia::render('Admin/Profile', [
            'status' => session('status'),
            'profileData' => $data
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        if($request->validated()){
            $this->service->saveAdminProfileData($request);
        }

        return Redirect::route('admin.profile.index');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
