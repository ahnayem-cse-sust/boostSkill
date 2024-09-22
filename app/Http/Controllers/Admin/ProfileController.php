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
    
    public function setModuleName()
    {
        $this->moduleName = MODULE_NAME_ADMIN;
    }

    /**
     * Display the user's profile information.
     */
    public function index()
    {
        if($this->hasPermission(PERMISSION_TYPE_READ))
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
        $validate = $request->validated();
        if($validate){
            return $this->service->saveAdminProfileData($request);
        }

        return $this->failure($validate);
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
