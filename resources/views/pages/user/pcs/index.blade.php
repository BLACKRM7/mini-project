@extends('layout.user.app')
@section('title', 'Daftar PC Tersedia')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>PC Tersedia</h1>
        </div>

        <div class="section-body">
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @forelse($rooms as $room)
                @if($room->pcs->count() > 0)
                    <h5 class="mt-4">{{ $room->room_name }} - {{ $room->location }}</h5>
                    <div class="row">
                        @foreach($room->pcs as $pc)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $pc->pc_name }}</h5>
                                        <p class="card-text text-muted">Kode: {{ $pc->pc_code }}</p>
                                        <p class="card-text"><small>{{ $pc->processor }} | RAM {{ $pc->ram }} | {{ $pc->storage }}</small></p>
                                        <span class="badge badge-success">Tersedia</span>
                                        <div class="mt-2">
                                            <a href="{{ route('user.pcs.show', $pc->id) }}" class="btn btn-sm btn-info">Detail</a>
                                            <a href="{{ route('user.borrowings.create', $pc->id) }}" class="btn btn-sm btn-primary">Pinjam</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            @empty
                <div class="alert alert-info">Belum ada PC yang tersedia saat ini.</div>
            @endforelse
        </div>
    </section>
</div>
@endsection
