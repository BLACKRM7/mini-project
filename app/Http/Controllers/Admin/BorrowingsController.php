<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrowing;
use App\Models\PC;
use App\Models\User;
use App\Models\ReturnModel;

class BorrowingsController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with(['user', 'pc.room'])->latest()->get();
        return view('pages.admin.borrowings.index', compact('borrowings'));
    }

    public function create()
    {
        $users = User::where('role', 'user')->get();
        $pcs = PC::where('status', 'available')->with('room')->get();
        return view('pages.admin.borrowings.create', compact('users', 'pcs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'     => 'required|exists:users,id',
            'pc_id'       => 'required|exists:pcs,id',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:borrow_date',
            'purpose'     => 'nullable|string',
            'status'      => 'required|in:pending,approved,returned,rejected',
        ]);

        Borrowing::create($request->only([
            'user_id', 'pc_id', 'borrow_date', 'return_date', 'purpose', 'status'
        ]));

        // Mark PC as unavailable if approved
        if ($request->status === 'approved') {
            PC::findOrFail($request->pc_id)->update(['status' => 'unavailable']);
        }

        return redirect()->route('admin.borrowings.index')->with('success', 'Data peminjaman berhasil ditambahkan.');
    }

    public function show($id)
    {
        $borrowing = Borrowing::with(['user', 'pc.room', 'returnData'])->findOrFail($id);
        return view('pages.admin.borrowings.show', compact('borrowing'));
    }

    public function edit($id)
    {
        $borrowing = Borrowing::findOrFail($id);
        $users = User::where('role', 'user')->get();
        $pcs = PC::with('room')->get();
        return view('pages.admin.borrowings.edit', compact('borrowing', 'users', 'pcs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id'     => 'required|exists:users,id',
            'pc_id'       => 'required|exists:pcs,id',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:borrow_date',
            'purpose'     => 'nullable|string',
            'status'      => 'required|in:pending,approved,returned,rejected',
        ]);

        $borrowing = Borrowing::findOrFail($id);
        $oldStatus = $borrowing->status;
        $borrowing->update($request->only([
            'user_id', 'pc_id', 'borrow_date', 'return_date', 'purpose', 'status'
        ]));

        // Update PC status based on borrowing status change
        $pc = PC::findOrFail($request->pc_id);
        if ($request->status === 'approved') {
            $pc->update(['status' => 'unavailable']);
        } elseif (in_array($request->status, ['returned', 'rejected'])) {
            $pc->update(['status' => 'available']);
        }

        return redirect()->route('admin.borrowings.index')->with('success', 'Data peminjaman berhasil diupdate.');
    }

    public function destroy($id)
    {
        $borrowing = Borrowing::findOrFail($id);
        // Free the PC if it was approved
        if ($borrowing->status === 'approved') {
            PC::find($borrowing->pc_id)?->update(['status' => 'available']);
        }
        $borrowing->delete();
        return redirect()->route('admin.borrowings.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }
}
