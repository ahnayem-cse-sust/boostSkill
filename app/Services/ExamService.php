<?php


namespace App\Services;

use App\Models\Exam;


class ExamService extends BaseService
{

    public function __construct()
    {
        
    }

    public function storeItem($data){
        if(Exam::create($data)){
            return $this->success('Course Created Successfully');
        }
        return $this->failure('Someting Went Wrong!!');
    }

    public function getAllItem(){
        $data = Exam::where(function($q){
          $q->where('status',COURSE_STATUS_ACTIVE)
            ->orWhere('status',null);
        })->get();

        return $this->success('Courses successfully retrived',$data);
    }

    public function getItem($id){
        $data = Exam::where('id',$id)->get();

        return $this->success('Course successfully retrived',$data);
    }

    public function updateItem($id, $updated_data){
        $data = Exam::where('id',$id)->first();
        if($data->update($updated_data)){
            return $this->success($data['title'].' Updated Successfully');
        }
        return $this->failure('Someting Went Wrong!!');
    }


}