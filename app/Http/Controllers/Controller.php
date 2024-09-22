<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\UserTypePermission;

abstract class Controller
{
    public $moduleName;
    abstract protected function setModuleName();

    protected function hasPermission($permissionName){
        $user = Auth::user();
        $userTypePermission = UserTypePermission::where('user_id',$user->id)
                                                ->where('user_type',$user->user_type)
                                                ->where('permission_type',$permissionName);
        if($userTypePermission->has_permission == 'Y'){
            return true;
        }
        return false;
    }

    protected function success($message, $data = [], $status = 200)
    {
        return response([
            'success' => true,
            'data' => $data,
            'message' => $message,
        ], $status);
    }

    protected function failure($message, $status = 422)
    {
        return response([
            'success' => false,
            'message' => $message,
        ], $status);
    }
}
