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
                                <a href="{{ route('users.create') }}" class="btn btn-primary">Anggota</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-md">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Email Verified At</th>
                                            <th>Password</th>
                                            <th>Role</th>
                                            <th>Remember Token</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                        </tr>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->email_verified_at }}</td>
                                                <td>{{ $user->password }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td>{{ $user->remember_token }}</td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>{{ $user->updated_at }}</td>
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
                $('#form-delete').attr('action', '/users/' + id);
                var check = confirm('APakah anda yakin ingin menghapus data ini?');
                if (check) {
                    $('#form-delete').submit();
                }
            }
            function handleEdit(id) {
                window.location.href = "/users/" + id + "/edit/";
            }
        </script>
    @endpush
@endsection