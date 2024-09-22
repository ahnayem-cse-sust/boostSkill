<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class WebsiteController extends Controller
{
    
    public function setModuleName()
    {
        $this->moduleName = MODULE_NAME_WEBSITE;
    }

    public function index(){
        
    }

    // public function about(){
    //     return Inertia::render('Frontend/About',[
    //         'title' => 'About Us Page'
    //     ]);
    // }
}
