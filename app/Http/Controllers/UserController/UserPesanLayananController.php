<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserPesanLayananController extends Controller
{
    public function index()
    {
        // Render view untuk form
        return view('user.pesananlayanan.index');
    }
}
