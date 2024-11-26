<?php


namespace App\Services;

use App\Models\Payment;


class PaymentService extends BaseService
{

    public function __construct()
    {
        
    }

    public function storeItem($data){
        if(Payment::create($data)){
            return $this->success('Course Created Successfully');
        }
        return $this->failure('Someting Went Wrong!!');
    }

    public function getAllItem(){
        $data = Payment::where(function($q){
          $q->where('status',COURSE_STATUS_ACTIVE)
            ->orWhere('status',null);
        })->get();

        return $this->success('Courses successfully retrived',$data);
    }

    public function getItem($id){
        $data = Payment::where('id',$id)->get();

        return $this->success('Course successfully retrived',$data);
    }

    public function updateItem($id, $updated_data){
        $data = Payment::where('id',$id)->first();
        if($data->update($updated_data)){
            return $this->success($data['title'].' Updated Successfully');
        }
        return $this->failure('Someting Went Wrong!!');
    }

    public function deleteItem($id){
        $data = Payment::where('id',$id)->first();
        if($data->delete()){
            return $this->success($data['title'].' Deleted Successfully');
        }
        return $this->failure('Someting Went Wrong!!');
    }


}