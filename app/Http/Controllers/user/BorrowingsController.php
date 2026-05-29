<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrowing;
use App\Models\PC;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BorrowingsController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::where('user_id', Auth::id())
            ->with(['pc.room', 'returnData'])
            ->latest()
            ->paginate(5);
        return view('pages.user.borrowings.index', compact('borrowings'));
    }

    public function create($pc_id)
    {
        $pc = PC::with('room')->findOrFail($pc_id);
        if ($pc->status !== 'available') {
            return redirect()->route('user.pcs.index')
                ->with('error', 'PC ini tidak tersedia untuk dipinjam.');
        }
        return view('pages.user.borrowings.create', compact('pc'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pc_id'          => 'required|exists:pcs,id',
            'borrow_date'    => 'required|date',
            'return_date'    => 'nullable|date|after_or_equal:borrow_date',
            'purpose'        => 'nullable|string|max:500',
            'identity_photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $photoPath = $request->file('identity_photo')->store('identity_photos', 'public');

        Borrowing::create([
            'user_id'        => Auth::id(),
            'pc_id'          => $request->pc_id,
            'borrow_date'    => $request->borrow_date,
            'return_date'    => $request->return_date,
            'purpose'        => $request->purpose,
            'identity_photo' => $photoPath,
            'status'         => 'pending',
        ]);

        return redirect()->route('user.borrowings.index')
            ->with('success', 'Permintaan peminjaman berhasil dikirim. Menunggu persetujuan admin.');
    }

    public function show($id)
    {
        $borrowing = Borrowing::where('user_id', Auth::id())
            ->with(['pc.room', 'returnData'])
            ->findOrFail($id);
        return view('pages.user.borrowings.show', compact('borrowing'));
    }

    public function destroy($id)
    {
        $borrowing = Borrowing::where('user_id', Auth::id())
            ->where('status', 'pending')
            ->findOrFail($id);

        if ($borrowing->identity_photo) {
            Storage::disk('public')->delete($borrowing->identity_photo);
        }

        $borrowing->delete();
        return redirect()->route('user.borrowings.index')
            ->with('success', 'Peminjaman berhasil dibatalkan.');
    }
}
