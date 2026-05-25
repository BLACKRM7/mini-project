@extends('layout.admin.app')
@section('title', 'Tambah Peminjaman')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Peminjaman</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Tambah Peminjaman</h4>
                            <a href="{{ route('admin.borrowings.index') }}" class="btn btn-secondary ml-auto">Kembali</a>
                        </div>
                        <div class="card-body">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $e)
                                            <li>{{ $e }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

<<<<<<< HEAD
                            <form action="{{ route('admin.borrowings.store') }}" method="POST" enctype="multipart/form-data">
=======
                            <form action="{{ route('admin.borrowings.store') }}" method="POST">
>>>>>>> 3c6b2094325379f20b2d886427a1bf16db81d900
                                @csrf
                                <div class="form-group">
                                    <label>Peminjam</label>
                                    <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" required>
                                        <option value="">-- Pilih User --</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                                {{ $user->name }} ({{ $user->email }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="form-group">
                                    <label>PC</label>
                                    <select name="pc_id" class="form-control @error('pc_id') is-invalid @enderror" required>
                                        <option value="">-- Pilih PC --</option>
                                        @foreach($pcs as $pc)
                                            <option value="{{ $pc->id }}" {{ old('pc_id') == $pc->id ? 'selected' : '' }}>
                                                {{ $pc->pc_name }} ({{ $pc->pc_code }}) - {{ $pc->room->room_name ?? '-' }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('pc_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Pinjam</label>
                                    <input type="datetime-local" name="borrow_date" value="{{ old('borrow_date') }}" class="form-control @error('borrow_date') is-invalid @enderror" required>
                                    @error('borrow_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Kembali</label>
                                    <input type="datetime-local" name="return_date" value="{{ old('return_date') }}" class="form-control @error('return_date') is-invalid @enderror" required>
                                    @error('return_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="form-group">
                                    <label>Tujuan</label>
                                    <textarea name="purpose" class="form-control @error('purpose') is-invalid @enderror" rows="3">{{ old('purpose') }}</textarea>
                                    @error('purpose')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="form-group">
                                    <label>Foto Identitas</label>
                                    <input type="file" name="identity_photo" accept="image/*" class="form-control @error('identity_photo') is-invalid @enderror" required>
                                    @error('identity_photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="approved" {{ old('status') == 'approved' ? 'selected' : '' }}>Approved</option>
                                        <option value="returned" {{ old('status') == 'returned' ? 'selected' : '' }}>Returned</option>
                                        <option value="rejected" {{ old('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                    @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
