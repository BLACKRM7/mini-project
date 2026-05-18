@extends('layout.user.app')
@section('title', 'Pinjam PC')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form Peminjaman PC</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pinjam: {{ $pc->pc_name }} ({{ $pc->pc_code }})</h4>
                            <a href="{{ route('user.pcs.index') }}" class="btn btn-secondary ml-auto">Kembali</a>
                        </div>
                        <div class="card-body">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                                </div>
                            @endif

                            <div class="alert alert-info mb-3">
                                <strong>Info PC:</strong> {{ $pc->pc_name }} | {{ $pc->processor }} | RAM {{ $pc->ram }} | {{ $pc->storage }}<br>
                                <strong>Ruangan:</strong> {{ $pc->room->room_name ?? '-' }} - {{ $pc->room->location ?? '-' }}
                            </div>

                            <form action="{{ route('user.borrowings.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="pc_id" value="{{ $pc->id }}">

                                <div class="form-group">
                                    <label>Tanggal Pinjam <span class="text-danger">*</span></label>
                                    <input type="datetime-local" name="borrow_date" value="{{ old('borrow_date') ? \Carbon\Carbon::parse(old('borrow_date'))->format('Y-m-d\\TH:i') : '' }}" class="form-control @error('borrow_date') is-invalid @enderror" required>
                                    @error('borrow_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="form-group">
                                    <label>Perkiraan Tanggal Kembali</label>
                                    <input type="datetime-local" name="return_date" value="{{ old('return_date') ? \Carbon\Carbon::parse(old('return_date'))->format('Y-m-d\\TH:i') : '' }}" class="form-control @error('return_date') is-invalid @enderror" required>
                                    @error('return_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="form-group">
                                    <label>Tujuan Peminjaman</label>
                                    <textarea name="purpose" class="form-control @error('purpose') is-invalid @enderror" rows="3" placeholder="Jelaskan tujuan peminjaman...">{{ old('purpose') }}</textarea>
                                    @error('purpose')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Kirim Permintaan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
