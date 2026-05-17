<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PC;
use App\Models\Room;

class PcsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::with('pcs')->get();

        return view('pages.admin.pcs.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rooms = Room::all();
        return view('pages.admin.pcs.create', compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'pc_code' => 'required|string|max:255|unique:pcs,pc_code',
            'pc_name' => 'required|string|max:255',
            'processor' => 'required|string|max:255',
            'ram' => 'required|string|max:255',
            'storage' => 'required|string|max:255',
            'status' => 'required|in:available,unavailable,maintenance',
        ]);

        PC::create([
            'room_id' => $request->room_id,
            'pc_code' => $request->pc_code,
            'pc_name' => $request->pc_name,
            'processor' => $request->processor,
            'ram' => $request->ram,
            'storage' => $request->storage,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.pcs.index')
            ->with('success', 'Data PC berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pc = PC::findOrFail($id);
        $rooms = Room::all();

        return view('pages.admin.pcs.edit', compact('pc', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'pc_code' => 'required|string|max:255|unique:pcs,pc_code,' . $id,
            'pc_name' => 'required|string|max:255',
            'processor' => 'required|string|max:255',
            'ram' => 'required|string|max:255',
            'storage' => 'required|string|max:255',
            'status' => 'required|in:available,unavailable,maintenance',
        ]);

        $pc = PC::findOrFail($id);
        $pc->update([
            'room_id' => $request->room_id,
            'pc_code' => $request->pc_code,
            'pc_name' => $request->pc_name,
            'processor' => $request->processor,
            'ram' => $request->ram,
            'storage' => $request->storage,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.pcs.index')
            ->with('success', 'Data PC berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pc = PC::findOrFail($id);
        $pc->delete();

        return redirect()
            ->route('admin.pcs.index')
            ->with('success', 'Data PC berhasil dihapus');
    }
}
