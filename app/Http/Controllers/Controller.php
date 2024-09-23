<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\UserTypePermission;
use App\Models\UserPermission;

abstract class Controller
{
    public $moduleName;
    abstract protected function setModuleName();

    protected function hasPermission($permissionName){
        $user = Auth::user();
        $userPermission = UserPermission::where('user_id',$user->id)
                                        ->where('user_type',$user->user_type)
                                        ->where('module_name',$this->moduleName)
                                        ->where('permission_type',$permissionName);
        if($userPermission){
            if($userPermission->has_permission == 'Y')
                return true;
            elseif($userPermission->has_permission == 'N')
                return false; 
        }                        
        $userTypePermission = UserTypePermission::where('module_name',$this->moduleName)
                                                ->where('user_type',$user->user_type)
                                                ->where('permission_type',$permissionName);
        if($userTypePermission && $userTypePermission->has_permission == 'Y'){
            return true;
        }
        return false;
    }

    protected function success($message, $data = [], $status = 200)
    {
        return response([
            'success' => true,
            'status_code' => $status,
            'data' => $data,
            'message' => $message,
        ], $status);
    }

    protected function failure($message, $status = 422)
    {
        return response([
            'success' => false,
            'status_code' => $status,
            'message' => $message,
        ], $status);
    }
}
