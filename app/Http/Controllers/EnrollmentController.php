<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnrollmentRequest;
use App\Services\En;
use App\Services\EnrollmentService;
use Inertia\Inertia;

class EnrollmentController extends Controller
{
    private $service;
    private $viewPath='Admin/Enrollment/';
    private $baseRoute='admin.enrollment.';
    public function __construct(EnrollmentService $service)
    {
        parent::__construct();
        $this->service = $service;
    }
    
    public function setModuleName()
    {
        $this->moduleName = MODULE_NAME_ENROLLMENT;
    }

    public function create(){
        if($this->hasPermission(PERMISSION_TYPE_CREATE)){
            return Inertia::render($this->viewPath.'Create');
        } else{
            return $this->unauthorizedPageResponse();
        }
    }

    public function store(EnrollmentRequest $request)
    {
        
        $validated = $request->validated();

        if($this->hasPermission(PERMISSION_TYPE_CREATE)){
            $response = $this->service->storeItem($request->all());
            return redirect()->route($this->baseRoute.'create')->with([
                'message' => $response['message'],
                'class' => $response['success'] ? 'alert alert-success' : 'alert alert-danger'
            ]);
        } else{
            return $this->unauthorizedPageResponse();
        }
    }

    public function getList()
    {
        if($this->hasPermission(PERMISSION_TYPE_READ)){
            $response = $this->service->getAllItem();
            return Inertia::render($this->viewPath.'List',[
               'data' => $response['data']
            ]);
        } else{
            return $this->unauthorizedPageResponse();
        }
    }

    public function details($id)
    {
        // dd($id);
        if($this->hasPermission(PERMISSION_TYPE_READ)){
            $response = $this->service->getItem($id);
            // dd($response);
            return Inertia::render($this->viewPath.'Details',[
               'data' => $response['data']
            ]);
        } else{
            return $this->unauthorizedPageResponse();
        }
    }

    public function edit($id)
    {
        // dd($id);
        if($this->hasPermission(PERMISSION_TYPE_UPDATE)){
            $response = $this->service->getItem($id);
            // dd($response);
            return Inertia::render($this->viewPath.'Edit',[
               'data' => $response['data']
            ]);
        } else{
            return $this->unauthorizedPageResponse();
        }
    }

    public function update($id, EnrollmentRequest $request)
    {
        // dd($id);
        if($this->hasPermission(PERMISSION_TYPE_UPDATE)){
            $response = $this->service->updateItem($id,$request->all());
            return redirect()->route($this->baseRoute.'list')->with([
                'message' => $response['message'],
                'class' => $response['success'] ? 'alert alert-success' : 'alert alert-danger'
            ]);
        } else{
            return $this->unauthorizedPageResponse();
        }
    }

    public function delete($id)
    {
        if($this->hasPermission(PERMISSION_TYPE_UPDATE)){
            $response = $this->service->deleteItem($id);
            return redirect()->route($this->baseRoute.'list')->with([
                'message' => $response['message'],
                'class' => $response['success'] ? 'alert alert-success' : 'alert alert-danger'
            ]);
        } else{
            return $this->unauthorizedPageResponse();
        }
        $event->delete();
        return redirect()->back();
    }
}
