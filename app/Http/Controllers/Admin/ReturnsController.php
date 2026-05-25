<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReturnModel;
use App\Models\Borrowing;
use App\Models\PC;

class ReturnsController extends Controller
{
    public function index()
    {
        $returns = ReturnModel::with(['borrowing.user', 'borrowing.pc.room'])->latest()->get();
        $returnedBorrowings = Borrowing::with(['user', 'pc.room', 'returnData'])
            ->where('status', 'returned')
            ->doesntHave('returnData')
            ->latest()
            ->get();

        return view('pages.admin.returns.index', compact('returns', 'returnedBorrowings'));
    }

    public function show($id)
    {
        $return = ReturnModel::with(['borrowing.user', 'borrowing.pc.room'])->findOrFail($id);
        return view('pages.admin.returns.show', compact('return'));
    }

    public function approve($id)
    {
        $return = ReturnModel::with('borrowing')->findOrFail($id);
        $return->borrowing->update(['status' => 'returned']);
        PC::find($return->borrowing->pc_id)?->update(['status' => 'available']);
        return redirect()->route('admin.returns.index')->with('success', 'Pengembalian berhasil dikonfirmasi.');
    }

    public function reject($id)
    {
        $return = ReturnModel::with('borrowing')->findOrFail($id);
        $return->borrowing->update(['status' => 'approved']); // revert to approved
        $return->delete();
        return redirect()->route('admin.returns.index')->with('success', 'Pengembalian ditolak.');
    }

    public function destroy($id)
    {
        ReturnModel::findOrFail($id)->delete();
        return redirect()->route('admin.returns.index')->with('success', 'Data pengembalian berhasil dihapus.');
    }
}
