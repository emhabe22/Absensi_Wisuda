@extends('frontend.dashboard')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <!-- Kartu Jumlah Keseluruhan -->
                <div class="col-12 col-lg-4">
                    <div class="card radius-15 bg-primary">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h2 class="mb-0 text-white">{{ $all6 }}</h2>
                                </div>
                                <div class="ms-auto font-35 text-white"><i class="bx bxs-group"></i></div>
                            </div>
                            <p class="mb-0 text-white">Jumlah Keseluruhan</p>
                        </div>
                    </div>
                </div>

                <!-- Kartu Jumlah Mahasiswa -->
                <div class="col-12 col-lg-4">
                    <div class="card radius-15 bg-success" id="toggleCardBtn" style="cursor: pointer;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h2 class="mb-0 text-white">{{ $all }}</h2>
                                </div>
                                <div class="ms-auto font-35 text-white"><i class="bx bxs-graduation"></i></div>
                            </div>
                            <p class="mb-0 text-white">Jumlah Mahasiswa</p>
                        </div>
                    </div>
                </div>

                <!-- Kartu Jumlah Orang Tua -->
                <div class="col-12 col-lg-4">
                    <div class="card radius-15 bg-warning" id="toggleOrangTuaBtn" style="cursor: pointer;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h2 class="mb-0 text-white">{{ $all2 }}</h2>
                                </div>
                                <div class="ms-auto font-35 text-white"><i class="bx bxs-user"></i></div>
                            </div>
                            <p class="mb-0 text-white">Jumlah Orang Tua</p>
                        </div>
                    </div>
                </div>

                <!-- Kartu Jumlah Panitia -->
                <div class="col-12 col-lg-4">
                    <div class="card radius-15 bg-secondary" id="togglePanitiaBtn" style="cursor: pointer;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h2 class="mb-0 text-white">{{ $all }}</h2>
                                </div>
                                <div class="ms-auto font-35 text-white"><i class="bx bxs-group"></i></div>
                            </div>
                            <p class="mb-0 text-white">Jumlah Panitia</p>
                        </div>
                    </div>
                </div>

                <!-- Kartu Jumlah Senat -->
                <div class="col-12 col-lg-4">
                    <div class="card radius-15 bg-danger" id="toggleSenatBtn" style="cursor: pointer;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h2 class="mb-0 text-white">{{ $all5 }}</h2>
                                </div>
                                <div class="ms-auto font-35 text-white"><i class="bx bxs-user-badge"></i></div>
                            </div>
                            <p class="mb-0 text-white">Jumlah Senat</p>
                        </div>
                    </div>
                </div>

                <!-- Kartu Jumlah Rektorat -->
                <div class="col-12 col-lg-4">
                    <div class="card radius-15 bg-info" id="toggleRektoratBtn" style="cursor: pointer;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h2 class="mb-0 text-white">{{ $all3 }}</h2>
                                </div>
                                <div class="ms-auto font-35 text-white"><i class="bx bxs-id-card"></i></div>
                            </div>
                            <p class="mb-0 text-white">Jumlah Rektorat</p>
                        </div>
                    </div>
                </div>

            </div>
            <!--end row-->

            <!-- Data Mahasiswa (Disembunyikan Secara Default) -->
            <div id="mahasiswaCard" style="display: none;">
                <div class="card radius-15 overflow-hidden">
                    <div class="card-header border-bottom-0">
                        <h5 class="mb-0">Data Mahasiswa</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" style="width:100%">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Photo</th>
                                        <th>Nama</th>
                                        <th>NIM</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mahasiswa as $mhs)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('assets/images/icons/user.png') }}" width="35"
                                                    class="rounded-circle" alt="">
                                            </td>
                                            <td>{{ $mhs->nama }}</td>
                                            <td>{{ $mhs->nim }}</td>
                                            <td>
                                                <span class="btn btn-{{ $mhs->status ? 'success' : 'danger' }} btn-sm">
                                                    {{ $mhs->status ? 'Sudah Absen' : 'Belum Absen' }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Orang Tua (Disembunyikan Secara Default) -->
            <div id="orangTuaCard" style="display: none;">
                <div class="card radius-15 overflow-hidden">
                    <div class="card-header border-bottom-0">
                        <h5 class="mb-0">Data Orang Tua</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" style="width:100%">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Nama Anak</th>
                                        <th>Wali</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orangtua as $parent)
                                        <tr>
                                            <td>{{ $parent->nama }}</td>
                                            <td>{{ $parent->mahasiswa->nama }}</td>
                                            <td>
                                                {{ $parent->tipe == 'A' ? 'Ayah' : ($parent->tipe == 'I' ? 'Ibu' : 'Tidak Diketahui') }}
                                            </td>
                                            <td>
                                                <span class="btn btn-{{ $parent->status ? 'success' : 'danger' }} btn-sm">
                                                    {{ $parent->status ? 'Sudah Absen' : 'Belum Absen' }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Card Tabel Panitia (Disembunyikan Secara Default) -->
            <div id="panitiaCard" style="display: none;">
                <div class="card radius-15 overflow-hidden">
                    <div class="card-header border-bottom-0">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="mb-0">Data Panitia</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($panitia as $pnt)
                                        <tr>
                                            <td>{{ $pnt->nama }}</td>
                                            <td>
                                                @if ($pnt->status)
                                                    <span class="btn btn-success btn-sm">Sudah Absen</span>
                                                @else
                                                    <span class="btn btn-danger btn-sm">Belum Absen</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Tabel Senat (Disembunyikan Secara Default) -->
            <div id="senatCard" style="display: none;">
                <div class="card radius-15 overflow-hidden">
                    <div class="card-header border-bottom-0">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="mb-0">Data Senat</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>UUID</th>
                                        <th>Nama Senat</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($senat as $snt)
                                        <tr>
                                            <td>{{ $snt->uuid }}</td>
                                            <td>{{ $snt->nama }}</td>
                                            <td>
                                                @if ($snt->status)
                                                    <span class="btn btn-success btn-sm">Sudah Absen</span>
                                                @else
                                                    <span class="btn btn-danger btn-sm">Belum Absen</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Tabel Rektorat (Disembunyikan Secara Default) -->
            <div id="rektoratCard" style="display: none;">
                <div class="card radius-15 overflow-hidden">
                    <div class="card-header border-bottom-0">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="mb-0">Data Rektorat</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>UUID</th>
                                        <th>Nama Rektorat</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rektorat as $rkt)
                                        <tr>
                                            <td>{{ $rkt->uuid }}</td>
                                            <td>{{ $rkt->nama }}</td>
                                            <td>
                                                @if ($rkt->status)
                                                    <span class="btn btn-success btn-sm">Sudah Absen</span>
                                                @else
                                                    <span class="btn btn-danger btn-sm">Belum Absen</span>
                                                @endif
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
    </div>
    <!-- SCRIPT UNTUK MENAMPILKAN HANYA SATU TABEL -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Tombol dan Card untuk setiap kategori
            let mahasiswaBtn = document.getElementById("toggleCardBtn");
            let mahasiswaCard = document.getElementById("mahasiswaCard");

            let orangTuaBtn = document.getElementById("toggleOrangTuaBtn");
            let orangTuaCard = document.getElementById("orangTuaCard");

            let panitiaBtn = document.getElementById("togglePanitiaBtn");
            let panitiaCard = document.getElementById("panitiaCard");

            let senatBtn = document.getElementById("toggleSenatBtn");
            let senatCard = document.getElementById("senatCard");

            let rektoratBtn = document.getElementById("toggleRektoratBtn");
            let rektoratCard = document.getElementById("rektoratCard");

            // Fungsi untuk menyembunyikan semua card sebelum menampilkan yang baru
            function hideAll() {
                let allCards = [mahasiswaCard, orangTuaCard, panitiaCard, senatCard, rektoratCard];
                allCards.forEach(card => {
                    if (card) card.style.display = "none";
                });
            }

            // Event Listener untuk setiap tombol
            if (mahasiswaBtn && mahasiswaCard) {
                mahasiswaBtn.addEventListener("click", function() {
                    hideAll();
                    mahasiswaCard.style.display = "block";
                });
            }

            if (orangTuaBtn && orangTuaCard) {
                orangTuaBtn.addEventListener("click", function() {
                    hideAll();
                    orangTuaCard.style.display = "block";
                });
            }

            if (panitiaBtn && panitiaCard) {
                panitiaBtn.addEventListener("click", function() {
                    hideAll();
                    panitiaCard.style.display = "block";
                });
            }

            if (senatBtn && senatCard) {
                senatBtn.addEventListener("click", function() {
                    hideAll();
                    senatCard.style.display = "block";
                });
            }

            if (rektoratBtn && rektoratCard) {
                rektoratBtn.addEventListener("click", function() {
                    hideAll();
                    rektoratCard.style.display = "block";
                });
            }
        });
    </script>
@endsection
