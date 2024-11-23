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
                    <h4 class="card-title">Manajemen Guru</h4>
                    <button class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#tambahGuru"> Tambah Guru
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="tambahGuru" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{ route('admin.manajemenGuru.store') }}" method="post">
                                    @csrf
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="tambahGuru">Tambah Guru</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label for="nama">Nama Guru</label>
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                placeholder="Nama Guru">
                                        </div>
                                        <div class="form-group">
                                            <label for="nip">NIP</label>
                                            <input type="text" class="form-control" id="nip" name="nip"
                                                placeholder="nip">
                                        </div>
                                        <div class="form-group">
                                            <label for="studi">Bidang Studi</label>
                                            <input type="text" class="form-control" id="studi" name="studi"
                                                placeholder="Bidang Studi">
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
                                    <th>Nama Guru </th>
                                    <th>NIP</th>
                                    <th>Bidang Studi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($guru as $g)
                                    <tr>

                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $g->nama }}</td>
                                        <td>{{ $g->nip }}</td>
                                        <td>{{ $g->bidang_studi }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#editGuru_{{ $g->id }}">Edit</button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="editGuru_{{ $g->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form action="{{ route('admin.manajemenGuru.update', $g->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="tambahGuru">Tambah Guru
                                                                    </h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="form-group">
                                                                        <label for="nama">Nama Guru</label>
                                                                        <input type="text" class="form-control"
                                                                            id="nama" name="nama"
                                                                            placeholder="Nama Guru" value="{{ $g->nama }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nip">NIP</label>
                                                                        <input type="text" class="form-control"
                                                                            id="nip" name="nip" placeholder="nip" value="{{ $g->nip }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="studi">Bidang Studi</label>
                                                                        <input type="text" class="form-control"
                                                                            id="studi" name="studi"
                                                                            placeholder="Bidang Studi" value="{{ $g->bidang_studi }}">
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
                                                <form action="{{ route('admin.manajemenGuru.destroy', $g->id) }}"
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
