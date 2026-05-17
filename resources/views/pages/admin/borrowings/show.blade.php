@extends('layout.admin.app')
@section('title', 'Detail Peminjaman')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Peminjaman</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail Peminjaman #{{ $borrowing->id }}</h4>
                            <a href="{{ route('admin.borrowings.index') }}" class="btn btn-secondary ml-auto">Kembali</a>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <table class="table table-bordered">
                                <tr><td width="30%"><strong>Peminjam</strong></td><td>{{ $borrowing->user->name ?? '-' }}</td></tr>
                                <tr><td><strong>Email</strong></td><td>{{ $borrowing->user->email ?? '-' }}</td></tr>
                                <tr><td><strong>PC</strong></td><td>{{ $borrowing->pc->pc_name ?? '-' }} ({{ $borrowing->pc->pc_code ?? '-' }})</td></tr>
                                <tr><td><strong>Ruangan</strong></td><td>{{ $borrowing->pc->room->room_name ?? '-' }}</td></tr>
                                <tr><td><strong>Tujuan</strong></td><td>{{ $borrowing->purpose ?? '-' }}</td></tr>
                                <tr><td><strong>Tanggal Pinjam</strong></td><td>{{ $borrowing->borrow_date }}</td></tr>
                                <tr><td><strong>Tanggal Kembali</strong></td><td>{{ $borrowing->return_date ?? '-' }}</td></tr>
                                <tr>
                                    <td><strong>Status</strong></td>
                                    <td>
                                        @php
                                            $badge = ['pending'=>'warning','approved'=>'success','returned'=>'info','rejected'=>'danger'][$borrowing->status] ?? 'secondary';
                                        @endphp
                                        <span class="badge badge-{{ $badge }}">{{ ucfirst($borrowing->status) }}</span>
                                    </td>
                                </tr>
                                @if($borrowing->returnData)
                                <tr><td><strong>Dikembalikan Pada</strong></td><td>{{ $borrowing->returnData->returned_at }}</td></tr>
                                <tr><td><strong>Catatan Kondisi</strong></td><td>{{ $borrowing->returnData->condition_notes ?? '-' }}</td></tr>
                                @endif
                            </table>
                            <a href="{{ route('admin.borrowings.edit', $borrowing->id) }}" class="btn btn-warning">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
