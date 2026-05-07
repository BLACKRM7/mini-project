@extends('layout.admin.app')
@section('title', 'Anggota')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Halaman Anggota</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>List Anggota</h4>
                                <a href="{{ route('anggota.create') }}" class="btn btn-primary">Anggota</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-md">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>No Telepon</th>
                                            <th>Email</th>
                                            <th>Tanggal Bergabung</th>
                                        </tr>
                                        @foreach($anggota as $anggota)
                                            <tr>
                                                <td>{{ $anggota->anggota_id }}</td>
                                                <td>{{ $anggota->nama }}</td>
                                                <td>{{ $anggota->alamat }}</td>
                                                <td>{{ $anggota->no_telepon }}</td>
                                                <td>{{ $anggota->email }}</td>
                                                <td>{{ $anggota->tanggal_bergabung }}</td>
                                            </tr>
                                        @endforeach
                                        @csrf
                                    </table>
                                </div>
                            </div>
                            </form>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    </section>
    </div>

    @push('js')
        <script>
            function handleDelete(id) {
                $('#form-delete').attr('action', '/anggota/' + id);
                var check = confirm('APakah anda yakin ingin menghapus data ini?');
                if (check) {
                    $('#form-delete').submit();
                }
            }
            function handleEdit(id) {
                window.location.href = "/anggota/" + id + "/edit/";
            }
        </script>
    @endpush
@endsection