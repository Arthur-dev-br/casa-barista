<?php

namespace App\Http\Controllers\Admin;

Use App\Http\Controllers\Controller;

// dash metodo para carregar a index (dash)
class AdminController extends Controller
{
    public function admin(){


     
        return view('admin.dashboard.dashboard');
    }
}