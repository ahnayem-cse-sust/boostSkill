<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Models\Course;
use App\Services\CourseService;
use Inertia\Inertia;

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
        dd($validated);

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
}
