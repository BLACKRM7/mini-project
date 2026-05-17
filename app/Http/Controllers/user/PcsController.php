<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PC;
use App\Models\Room;

class PcsController extends Controller
{
    public function index()
    {
        $rooms = Room::with(['pcs' => function ($q) {
            $q->where('status', 'available');
        }])->get();
        return view('pages.user.pcs.index', compact('rooms'));
    }

    public function show($id)
    {
        $pc = PC::with('room')->findOrFail($id);
        return view('pages.user.pcs.show', compact('pc'));
    }
}
