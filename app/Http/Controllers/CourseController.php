<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Services\CourseService;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    private $service;
    public function __construct(CourseService $service)
    {
        parent::__construct();
        $this->service = $service;
    }
    
    public function setModuleName()
    {
        $this->moduleName = MODULE_NAME_COURSE;
    }

    public function create(){
        if($this->hasPermission(PERMISSION_TYPE_CREATE)){
            return Inertia::render('Admin/Course/Create');
        } else{
            return $this->unauthorizedPageResponse();
        }
    }

    public function store(CourseRequest $request)
    {
        
        $validated = $request->validated();

        if($this->hasPermission(PERMISSION_TYPE_CREATE)){
            $response = $this->service->store($request->all());
            return redirect()->route('admin.course.create')->with([
                'message' => $response['message'],
                'class' => $response['success'] ? 'alert alert-success' : 'alert alert-danger'
            ]);
        } else{
            return $this->unauthorizedPageResponse();
        }
    }

    public function allCourses()
    {
        if($this->hasPermission(PERMISSION_TYPE_READ)){
            $response = $this->service->getAllCourses();
            return Inertia::render('Admin/Course/List',[
               'courses' => $response['data']
            ]);
        } else{
            return $this->unauthorizedPageResponse();
        }
    }

    public function details($id)
    {
        // dd($id);
        if($this->hasPermission(PERMISSION_TYPE_READ)){
            $response = $this->service->getCourse($id);
            // dd($response);
            return Inertia::render('Admin/Course/Details',[
               'course' => $response['data']
            ]);
        } else{
            return $this->unauthorizedPageResponse();
        }
    }
}
