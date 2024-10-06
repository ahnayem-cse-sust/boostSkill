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

    public function getAllCourses($user_type){

        switch ($user_type) {
            case USER_TYPE_STUDENT:
              //code block
              break;
            case USER_TYPE_TEACHER:
              //code block;
              break;
            case AD:
              //code block
              break;
            default:
              //code block
          }
    }


}