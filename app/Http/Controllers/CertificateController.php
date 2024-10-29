<?php

namespace App\Http\Controllers;

use App\Http\Requests\CertificateRequest;
use App\Services\CertificateService;
use Inertia\Inertia;

class CertificateController extends Controller
{
    private $service;
    private $viewPath='Admin/Certificate/';
    private $baseRoute='admin.certificate.';
    public function __construct(CertificateService $service)
    {
        parent::__construct();
        $this->service = $service;
    }
    
    public function setModuleName()
    {
        $this->moduleName = MODULE_NAME_CERTIFICATE;
    }

    public function create(){
        if($this->hasPermission(PERMISSION_TYPE_CREATE)){
            return Inertia::render($this->viewPath.'Create');
        } else{
            return $this->unauthorizedPageResponse();
        }
    }

    public function store(CertificateRequest $request)
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

    public function update($id, CertificateRequest $request)
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
}
