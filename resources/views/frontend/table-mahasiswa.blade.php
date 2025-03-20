@extends('frontend.dashboard')
@section('content')
    <div class="page-wrapper">
        <!--page-content-wrapper-->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Tabel</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Tabel Mahasiswa</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4 class="mb-0">Data Mahasiswa</h4>
                        </div>
                        <hr />
                        <div class="table-responsive">
                            <table id="mahasiswaTabel" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>NIM</th>
                                        <th>NIK</th>
                                        <th>Email</th>
                                        <th>No Telepon</th>
                                        <th>TTL</th>
                                        <th>Alamat</th>
                                        <th>Jurusan</th>
                                        <th>IPK</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $mhs)
                                        <tr>
                                            <td>
                                                <img src="{{ $mhs->foto ? asset('foto/mahasiswa/' . $mhs->foto) : asset('assets/images/default-profile.png') }}"
                                                    width="80" height="80" class="img-thumbnail">
                                            </td>
                                            <td>{{ $mhs->nama }}</td>
                                            <td>{{ $mhs->nim }}</td>
                                            <td>{{ $mhs->nik }}</td>
                                            <td>{{ $mhs->email }}</td>
                                            <td>{{ $mhs->no_hp }}</td>
                                            <td>{{ $mhs->tempat_tanggal_lahir }}</td>
                                            <td>{{ $mhs->alamat }}</td>
                                            <td>{{ $mhs->jurusan }}</td>
                                            <td>{{ $mhs->ipk }}</td>
                                            <td>
                                                @if ($mhs->status)
                                                    <span class="btn btn-success btn-sm">Sudah Absen</span>
                                                @else
                                                    <span class="btn btn-danger btn-sm">Belum Absen</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('mahasiswa.edit', $mhs->nim) }}"
                                                    class="btn btn-info">Edit</a>
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
        <!--end page-content-wrapper-->
    </div>

    <!-- jQuery harus dimuat pertama kali -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <!-- DataTables Initialization -->
    <script>
        $(document).ready(function() {
            $('#mahasiswaTabel').DataTable();
        });
    </script>
@endsection
