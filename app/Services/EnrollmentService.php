<?php


namespace App\Services;

use App\Models\Enrollment;


class EnrollmentService extends BaseService
{

    public function __construct()
    {
        
    }

    public function storeItem($data){
        if(Enrollment::create($data)){
            return $this->success('Course Created Successfully');
        }
        return $this->failure('Someting Went Wrong!!');
    }

    public function getAllItem(){
        $data = Enrollment::where(function($q){
          $q->where('status',COURSE_STATUS_ACTIVE)
            ->orWhere('status',null);
        })->get();

        return $this->success('Courses successfully retrived',$data);
    }

    public function getItem($id){
        $data = Enrollment::where('id',$id)->get();

        return $this->success('Course successfully retrived',$data);
    }

    public function updateItem($id, $updated_data){
        $data = Enrollment::where('id',$id)->first();
        if($data->update($updated_data)){
            return $this->success($data['title'].' Updated Successfully');
        }
        return $this->failure('Someting Went Wrong!!');
    }

    public function deleteItem($id){
        $data = Enrollment::where('id',$id)->first();
        if($data->delete()){
            return $this->success($data['title'].' Deleted Successfully');
        }
        return $this->failure('Someting Went Wrong!!');
    }


}