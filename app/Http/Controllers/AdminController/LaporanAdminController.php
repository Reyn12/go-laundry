<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanAdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.laporan-statistik.index', [
            'mainTitle' => 'Laporan & Statistik'
        ]);    
    }
}