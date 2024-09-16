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
        $data = Admin::where('id',$request->id)->first();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();

        return $this->success('Successfully updated.',$data->toArray());
    }

}