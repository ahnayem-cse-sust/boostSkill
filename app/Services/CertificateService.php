<?php


namespace App\Services;

use App\Models\Certificate;


class CertificateService extends BaseService
{

    public function __construct()
    {
        
    }

    public function storeItem($data){
        if(Certificate::create($data)){
            return $this->success('Course Created Successfully');
        }
        return $this->failure('Someting Went Wrong!!');
    }

    public function getAllItem(){
        $data = Certificate::where(function($q){
          $q->where('status',COURSE_STATUS_ACTIVE)
            ->orWhere('status',null);
        })->get();

        return $this->success('Courses successfully retrived',$data);
    }

    public function getItem($id){
        $data = Certificate::where('id',$id)->get();

        return $this->success('Course successfully retrived',$data);
    }

    public function updateItem($id, $updated_data){
        $data = Certificate::where('id',$id)->first();
        if($data->update($updated_data)){
            return $this->success($data['title'].' Updated Successfully');
        }
        return $this->failure('Someting Went Wrong!!');
    }


}