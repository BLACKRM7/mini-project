@extends('layout.user.app')
@section('title', 'Detail PC')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail PC</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $pc->pc_name }}</h4>
                            <a href="{{ route('user.pcs.index') }}" class="btn btn-secondary ml-auto">Kembali</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr><td width="40%"><strong>Kode PC</strong></td><td>{{ $pc->pc_code }}</td></tr>
                                <tr><td><strong>Nama PC</strong></td><td>{{ $pc->pc_name }}</td></tr>
                                <tr><td><strong>Ruangan</strong></td><td>{{ $pc->room->room_name ?? '-' }}</td></tr>
                                <tr><td><strong>Lokasi</strong></td><td>{{ $pc->room->location ?? '-' }}</td></tr>
                                <tr><td><strong>Processor</strong></td><td>{{ $pc->processor ?? '-' }}</td></tr>
                                <tr><td><strong>RAM</strong></td><td>{{ $pc->ram ?? '-' }}</td></tr>
                                <tr><td><strong>Storage</strong></td><td>{{ $pc->storage ?? '-' }}</td></tr>
                                <tr>
                                    <td><strong>Status</strong></td>
                                    <td>
                                        @php $b = ['available'=>'success','unavailable'=>'danger','maintenance'=>'warning'][$pc->status] ?? 'secondary'; @endphp
                                        <span class="badge badge-{{ $b }}">{{ ucfirst($pc->status) }}</span>
                                    </td>
                                </tr>
                            </table>
                            @if($pc->status === 'available')
                                <a href="{{ route('user.borrowings.create', $pc->id) }}" class="btn btn-primary">Pinjam PC Ini</a>
                            @else
                                <button class="btn btn-secondary" disabled>Tidak Tersedia</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
