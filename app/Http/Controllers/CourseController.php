<?php

namespace App\Http\Controllers;

use App\Services\CourseService;
use Illuminate\Http\Request;
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
            return Inertia::render('Admin/Course/Create', [
                'status' => session('status'),
            ]);
        } else{
            return $this->unauthorizedPageResponse();
        }
    }

    public function store(Request $request){
        dd('ffff');
        if($this->hasPermission(PERMISSION_TYPE_CREATE)){
            $this->service->store($request);
        } else{
            return $this->unauthorizedPageResponse();
        }
    }
}
