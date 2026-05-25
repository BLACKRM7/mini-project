@extends('layout.admin.app')
@section('title', 'Peminjaman')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Halaman Peminjaman</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>List Peminjaman</h4>
                            <a href="{{ route('admin.borrowings.create') }}" class="btn btn-primary">Tambah Peminjaman</a>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Peminjam</th>
                                            <th>PC</th>
                                            <th>Ruangan</th>
                                            <th>Tujuan</th>
                                            <th>Waktu Pinjam</th>
                                            <th>Waktu Kembali</th>
                                            <th>Status</th>
                                            <th>Foto Identitas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($borrowings as $i => $borrowing)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $borrowing->user->name ?? '-' }}</td>
                                                <td>{{ $borrowing->pc->pc_name ?? '-' }} ({{ $borrowing->pc->pc_code ?? '-' }})</td>
                                                <td>{{ $borrowing->pc->room->room_name ?? '-' }}</td>
                                                <td>{{ $borrowing->purpose ?? '-' }}</td>
                                                <td>{{ $borrowing->borrow_date }}</td>
                                                <td>{{ $borrowing->return_date ?? '-' }}</td>
                                                <td>
                                                    <form action="{{ route('admin.borrowings.update', $borrowing->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="user_id" value="{{ $borrowing->user_id }}">
                                                        <input type="hidden" name="pc_id" value="{{ $borrowing->pc_id }}">
                                                        <input type="hidden" name="borrow_date" value="{{ $borrowing->borrow_date }}">
                                                        @if($borrowing->return_date)
                                                            <input type="hidden" name="return_date" value="{{ $borrowing->return_date }}">
                                                        @endif
                                                        <input type="hidden" name="purpose" value="{{ $borrowing->purpose }}">
                                                        <select name="status" class="form-control form-control-sm" onchange="this.form.submit()">
                                                            <option value="pending" {{ $borrowing->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                            <option value="approved" {{ $borrowing->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                                            <option value="returned" {{ $borrowing->status == 'returned' ? 'selected' : '' }}>Returned</option>
                                                            <option value="rejected" {{ $borrowing->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                                        </select>
                                                    </form>
                                                </td>
                                                <td>
                                                    @if($borrowing->identity_photo)
                                                        <a href="{{ asset('storage/' . $borrowing->identity_photo) }}" target="_blank" class="btn btn-sm btn-secondary">Lihat</a>
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.borrowings.show', $borrowing->id) }}" class="btn btn-sm btn-info">Detail</a>
                                                    <a href="{{ route('admin.borrowings.edit', $borrowing->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                    <form action="{{ route('admin.borrowings.destroy', $borrowing->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center">Belum ada data peminjaman.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
