<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;

class BannerController extends Controller
{
    // Listar todos os banners cadastrados
    public function index()
    {
        $listaBanner = Collect();

        return view('admin.banner.index', compact('listaBanner'));
    }
}