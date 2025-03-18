@extends('frontend.dashboard')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
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

                <div class="col-12 col-lg-4">
                    <div class="card radius-15 bg-success" id="showTable" style="cursor: pointer;">
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

                <div class="col-12 col-lg-4">
                    <div class="card radius-15 bg-warning">
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
            </div>
            <!--end row-->

            <!-- TABEL MAHASISWA -->
            <div class="card radius-15 overflow-hidden" id="table-mahasiswa" style="display: none;">
                <div class="card-header border-bottom-0">
                    <div class="d-flex align-items-center">
                        <div>
                            <h5 class="mb-0">Daftar Mahasiswa</h5>
                        </div>
                        <div class="ms-auto">
                            <button type="button" class="btn btn-danger btn-sm px-4 radius-15"
                                id="closeTable">Tutup</button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Jurusan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mahasiswa as $mhs)
                                    <tr>
                                        <td>{{ $mhs->nama }}</td>
                                        <td>{{ $mhs->nim }}</td>
                                        <td>{{ $mhs->jurusan }}</td>
                                        <td>
                                            @if ($mhs->status)
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
            <!-- END TABEL MAHASISWA -->

        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#showTable").click(function() {
                $("#table-mahasiswa").slideDown(); // Munculkan tabel dengan animasi slide
            });

            $("#closeTable").click(function() {
                $("#table-mahasiswa").slideUp(); // Sembunyikan tabel dengan animasi slide
            });
        });
    </script>
@endsection
