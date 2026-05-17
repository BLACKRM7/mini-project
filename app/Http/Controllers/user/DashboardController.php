<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Borrowing;
use App\Models\PC;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $activeBorrowings = Borrowing::where('user_id', $userId)
            ->whereIn('status', ['pending', 'approved'])
            ->with('pc.room')
            ->latest()
            ->take(5)
            ->get();
        $totalBorrowings = Borrowing::where('user_id', $userId)->count();
        $availablePcs = PC::where('status', 'available')->count();
        return view('pages.user.dashboard', compact('activeBorrowings', 'totalBorrowings', 'availablePcs'));
    }
}
