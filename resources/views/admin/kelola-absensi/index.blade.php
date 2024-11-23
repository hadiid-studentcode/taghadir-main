@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <h4 class="card-title">Kelola Absensi</h4>
                    <button class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#tambahKelola"> Tambah
                        Kelola Absensi
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="tambahKelola" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('admin.kelolaAbsensi.store') }}" method="post">
                                    @csrf
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="tambahKelola">Tambah Kelola Absensi</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label for="tanggal">Tanggal</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                                placeholder="Tanggal">
                                        </div>
                                        <div class="form-group">
                                            <label for="waktu_masuk">Waktu Masuk</label>
                                            <input type="time" class="form-control" id="waktu_masuk" name="waktu_masuk"
                                                placeholder="Waktu Masuk">
                                        </div>
                                        <div class="form-group">
                                            <label for="waktu_keluar">Waktu Keluar</label>
                                            <input type="time" class="form-control" id="waktu_keluar"
                                                name="waktu_keluar" placeholder="Waktu keluar">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal </th>
                                    <th>Waktu Masuk</th>
                                    <th>Waktu Keluar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kelolaAbsensi as $ka)
                                    <tr>

                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ka->tanggal }}</td>
                                        <td>{{ $ka->waktu_masuk }}</td>
                                        <td>{{ $ka->waktu_keluar }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#editKelolaAbsensi">Edit</button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="editKelolaAbsensi" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="{{ route('admin.kelolaAbsensi.update', $ka->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="tambahKelola">Edit
                                                                        Kelola Absensi</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="form-group">
                                                                        <label for="tanggal">Tanggal</label>
                                                                        <input type="date" class="form-control"
                                                                            id="tanggal" name="tanggal"
                                                                            placeholder="Tanggal" value="{{ $ka->tanggal }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="waktu_masuk">Waktu Masuk</label>
                                                                        <input type="time" class="form-control"
                                                                            id="waktu_masuk" name="waktu_masuk"
                                                                            placeholder="Waktu Masuk" value="{{ $ka->waktu_masuk }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="waktu_keluar">Waktu Keluar</label>
                                                                        <input type="time" class="form-control"
                                                                        id="waktu_keluar" name="waktu_keluar"
                                                                        placeholder="Waktu keluar" value="{{ $ka->waktu_keluar }}">
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form action="{{ route('admin.kelolaAbsensi.destroy', $ka->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Hapus data ini?')">Hapus</button>

                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
