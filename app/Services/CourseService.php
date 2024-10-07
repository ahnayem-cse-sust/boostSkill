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

    public function getAllCourses(){
        $courses = Course::where(function($q){
          $q->where('status',COURSE_STATUS_ACTIVE)
            ->orWhere('status',null);
        })->get();

        return $this->success('Courses successfully retrived',$courses);
    }

    public function getCourse($id){
      $course = Course::where('id',$id)->get();

      return $this->success('Course successfully retrived',$course);
  }


}