<?php


namespace App\Services;

use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\EnrolledCourse;


class CourseService extends BaseService
{

    public function __construct()
    {
        
    }

    public function store($data){
        if(Course::create($data)){
            return $this->success('Course Created Successfully');
        }
        return $this->failure('Someting Went Wrong!!');
    }


}