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
                    <h4 class="card-title">Absensi</h4>
                 

                    <!-- Modal -->
                  
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Guru </th>
                                    <th>Tanggal</th>
                                    <th>Waktu Absensi Masuk</th>
                                    <th>Waktu Absensi Pulang</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absensi as $a)
                                    <tr>

                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $a->guru->nama }}</td>
                                        <td>{{ $a->waktu_masuk }}</td>
                                        <td>{{ $a->waktu_keluar }}</td>
                                        <td>{{ $a->status }}</td>
                                       
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
