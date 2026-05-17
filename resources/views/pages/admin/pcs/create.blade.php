@extends('layout.admin.app')
@section('title', 'tambah pcs')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Halaman Tambah pcs</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">Form Tambah pcs</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ url('admin/pcs') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="room_id">Room ID</label>
                                        <select class="form-control @error('room_id') is-invalid @enderror" id="room_id" name="room_id" required>
                                            <option value="">Pilih Lantai / Kategori PC</option>
                                            @foreach($rooms as $room)
                                                <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>{{ $room->room_name }} - {{ $room->location }}</option>
                                            @endforeach
                                        </select>
                                        @error('room_id')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="pc_code">Pc Code</label>
                                        <input type="text" class="form-control @error('pc_code') is-invalid @enderror" 
                                            id="pc_code" name="pc_code" value="{{ old('pc_code') }}"
                                            placeholder="Isi Pc Code..." required>
                                        @error('pc_code')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="pc_name">Pc Name</label>
                                        <input type="text" class="form-control @error('pc_name') is-invalid @enderror" 
                                            id="pc_name" name="pc_name" value="{{ old('pc_name') }}"
                                            placeholder="Isi Pc Name..." required>
                                        @error('pc_name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="processor">Processor</label>
                                        <input type="text" class="form-control @error('processor') is-invalid @enderror" 
                                            id="processor" name="processor" value="{{ old('processor') }}"
                                            placeholder="Isi Processor..." required>
                                        @error('processor')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="ram">RAM</label>
                                        <input type="text" class="form-control @error('ram') is-invalid @enderror" 
                                            id="ram" name="ram" value="{{ old('ram') }}"
                                            placeholder="Isi RAM..." required>
                                        @error('ram')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="storage">Storage</label>
                                        <input type="text" class="form-control @error('storage') is-invalid @enderror" 
                                            id="storage" name="storage" value="{{ old('storage') }}"
                                            placeholder="Isi Storage..." required>
                                        @error('storage')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="choice">
                                        <label for="status">Status</label>
                                        <select class="form-control @error('status') is-invalid @enderror" 
                                            id="status" name="status" required>
                                            <option value="">Pilih Status...</option>
                                            <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                                            <option value="unavailable" {{ old('status') == 'unavailable' ? 'selected' : '' }}>unavailable</option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <a href="{{ route('pcs.index') }}" class="btn btn-secondary">Batal</a>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection