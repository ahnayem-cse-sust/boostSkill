<?php


namespace App\Services;

use App\Models\Admin;


class ProfileService extends BaseService
{

    public function __construct()
    {
        
    }

    public function getAdminProfileData($id){
        $data = Admin::where('id',$id)->first()->toArray();
        return $data;
    }

    public function saveAdminProfileData($request){
        dd($request);
        $data = Admin::where('id',$request->id)->first()->toArray();
        $data->name = $request->name;

        return $data;
    }

}