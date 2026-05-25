<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PC;
use App\Models\Borrowing;
use App\Models\ReturnModel;

class DashboardController extends Controller
{
    /**
     * Display admin dashboard
     */
    public function index()
    {
        $totalUsers     = User::where('role', 'user')->count();
        $totalPcs         = PC::count();
        $availablePcs     = PC::where('status', 'available')->count();
        $totalBorrowings  = Borrowing::count();
        $pendingBorrowings = Borrowing::where('status', 'pending')->count();
        $activeBorrowings = Borrowing::where('status', 'approved')->count();

        return view('pages.admin.dashboard', compact(
            'totalUsers', 'totalPcs', 'availablePcs', 'totalBorrowings', 'pendingBorrowings', 'activeBorrowings'
        ));
    }
}
