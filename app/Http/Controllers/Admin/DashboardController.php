<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display admin dashboard
     */
    public function index()
    {
        return view('pages.admin.dashboard');
    }
}
