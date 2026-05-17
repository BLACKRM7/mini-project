@extends('layout.admin.app')
@section('title', 'pcs')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Halaman pcs</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>List pcs</h4>
                                <a href="{{ url('admin/pcs/create') }}" class="btn btn-primary">Tambah pcs</a>
                            </div>
                            <div class="card-body">
                                @if(session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                @forelse($rooms as $room)
                                    <h5 class="mt-4">{{ $room->room_name }} - {{ $room->location }}</h5>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-md mb-4">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Pc Code</th>
                                                    <th>Pc Name</th>
                                                    <th>Processor</th>
                                                    <th>RAM</th>
                                                    <th>Storage</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($room->pcs as $pc)
                                                    <tr>
                                                        <td>{{ $pc->id }}</td>
                                                        <td>{{ $pc->pc_code }}</td>
                                                        <td>{{ $pc->pc_name }}</td>
                                                        <td>{{ $pc->processor }}</td>
                                                        <td>{{ $pc->ram }}</td>
                                                        <td>{{ $pc->storage }}</td>
                                                        <td>{{ $pc->status }}</td>
                                                        <td>
                                                            <a href="{{ route('pcs.edit', $pc->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                            <form action="{{ route('pcs.destroy', $pc->id) }}" method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="8" class="text-center">Belum ada PC untuk {{ $room->room_name }}.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                @empty
                                    <div class="alert alert-info">Belum ada ruangan terdaftar. Tambahkan room terlebih dahulu.</div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection