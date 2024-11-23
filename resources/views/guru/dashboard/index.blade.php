@extends('layouts.main')

@push('link')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
        }

        .leaflet-container {
            height: 400px;
            width: 600px;
            max-width: 100%;
            max-height: 100%;
        }
    </style>

    <style>
        body {
            padding: 0;
            margin: 0;
        }

        #map {}
    </style>
@endpush

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-tab">

                    <div class="tab-content tab-content-basic">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">


                            <div class="row">
                                <div class="col-lg-8 d-flex flex-column">


                                    <div class="row flex-grow">
                                        <div class="col-12 grid-margin stretch-card">
                                            <div class="card card-rounded">
                                                <div class="card-body">
                                                    <div class="d-sm-flex justify-content-between align-items-start">
                                                        <div>
                                                            <h4 class="card-title card-title-dash">Absensi Bulan
                                                                {{ $bulanHariIni_info }}</h4>

                                                        </div>

                                                    </div>
                                                    <div class="table-responsive  mt-1">
                                                        <table class="table select-table">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Tanggal</th>
                                                                    <th>Waktu Masuk</th>
                                                                    <th>Waktu Keluar</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @if ($absensiHariIni != null && $absensiHariIni->isNotEmpty())
                                                                    @foreach ($absensiHariIni as $a)
                                                                        <tr>
                                                                            <td>{{ $loop->iteration }}</td>
                                                                            <td>{{ $a->date }}</td>
                                                                            <td>{{ $a->waktu_masuk }}</td>
                                                                            <td>{{ $a->waktu_keluar }}</td>
                                                                            <td>{{ $a->status }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                @else
                                                                    <tr>
                                                                        <td colspan="5" class="text-center">Tidak ada
                                                                            absensi</td>
                                                                    </tr>
                                                                @endif


                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-4 d-flex flex-column">

                                    <div class="row flex-grow">
                                        <div class="col-12 grid-margin stretch-card">
                                            <div class="card card-rounded">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div
                                                                class="d-flex justify-content-between align-items-center mb-3">
                                                                <h4 class="card-title card-title-dash">Absen
                                                                    {{ $tanggalHariIni_info }}
                                                                </h4>

                                                            </div>
                                                            <p class="text-muted "> {{ $waktuHariIni }} WIB
                                                            </p>

                                                            <div id="map"></div>
                                                            <div class="mt-3 text-center">

                                                                @if (
                                                                    $tanggalHariIni == $tanggalAbsensiTerbaru &&
                                                                        ($waktuHariIni >= $waktu_bukaAbsensiTerbaru && $waktuHariIni <= $waktu_tutupAbsensiTerbaru))
                                                                    <button class="btn btn-primary btn-lg text-white"
                                                                        onclick="handleClickAbsensi({{ $id_guru }})">Lakukan
                                                                        Absensi</button>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.34/moment-timezone-with-data.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>






    <script>
        let data = [];
        const posisiSaya = {
            lat: 0.499015,
            lng: 101.415591,
        };
    </script>

    <script>
        const map = L.map('map').fitWorld();
        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        function onLocationFound(e) {

            const radius = e.accuracy / 1000;

            // ambil data lokasi sekarang
            const lat = e.latlng.lat
            const lng = e.latlng.lng

            data.push({
                lat,
                lng
            });
            // ambil data lokasi sekarang

            // posisi saya fakker
            const posisiSaya = {
                lat: 0.499015,
                lng: 101.415591,
            };
            const locationMarker = L.marker(posisiSaya).addTo(map)
                .bindPopup(`You are within ${radius} meters from this point`).openPopup();

            const locationCircle = L.circle(posisiSaya, radius).addTo(map);

            // posisi saya fakker



            // const locationMarker = L.marker(e.latlng).addTo(map)
            //     .bindPopup(`You are within ${radius} meters from this point`).openPopup();

            // const locationCircle = L.circle(e.latlng, radius).addTo(map);


        }

        function onLocationError(e) {
            alert(e.message);
        }

        map.on('locationfound', onLocationFound);
        map.on('locationerror', onLocationError);

        map.locate({
            setView: true,
            maxZoom: 16
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        function handleClickAbsensi(idGuru) {

            const lat = data[0].lat
            const lng = data[0].lng

            // const posisiSaya = {
            //     lat: lat,
            //     lng: lng,
            // };

            const posisiSaya = {
                lat: 0.499015,
                lng: 101.415591,
            };


            const latlng_kiri = {
                lat: 0.499031,
                lng: 101.414903,
            };


            const latlng_kanan = {
                lat: 0.499272,
                lng: 101.416038,
            };

            const latlng_bawah = {
                lat: 0.498039,
                lng: 101.415563,
            };


            const latlng_atas = {
                lat: 0.500044,
                lng: 101.415416,
            };




            //  buat percabangan apakah lokasi anda sudah berada disekolah?
            if (
                posisiSaya.lat >= latlng_bawah.lat &&
                posisiSaya.lat <= latlng_atas.lat &&
                posisiSaya.lng >= latlng_kiri.lng &&
                posisiSaya.lng <= latlng_kanan.lng
            ) {
                alert('berada disekolah')

                // axios.get('/absensi', )
                //     .then(function(response) {
                //         console.log(response.data);
                //     })
                //     .catch(function(error) {
                //         console.log(error);
                //     });
                // const datetime = moment().tz("Asia/Jakarta");
                // const tanggal = datetime.format('YYYY-MM-DD');
                // const waktu = datetime.format('HH:mm:ss');
                // Mendapatkan token CSRF dari meta tag

                const data = {

                    idGuru: idGuru,

                };
                axios.post('/guru/absensi', data)
                    .then(function(response) {
                        if (response.status == 200) {

                            alert(response.data.message);
                            // reload data
                            window.location.reload();
                        } else {
                            alert('Absensi Gagal')
                        }
                    })
                    .catch(function(error) {
                        alert('Absensi Gagal')

                    });

                return;



            } else {

                alert('tidak berada disekolah')

            }


        }
    </script>
@endpush
