@extends('frontend.dashboard')
@section('content')
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
                            <li class="breadcrumb-item active" aria-current="page">Tabel Orang Tua</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="mb-0">Data Orang Tua</h4>
                    </div>
                    <hr />
                    <div class="table-responsive">
                        <table id="orangtauTabel" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Nama Anak</th>
                                    <th>Wali</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $parent)
                                    <tr>
                                        <td>{{ $parent->nama }}</td>
                                        <td>{{ $parent->mahasiswa->nama }}</td>
                                        <td>
                                            @if ($parent->tipe == 'A')
                                                Ayah
                                            @elseif($parent->tipe == 'I')
                                                Ibu
                                            @else
                                                Tidak Diketahui
                                            @endif
                                        </td>
                                        <td>
                                            @if ($parent->status)
                                                <span class="btn btn-success btn-sm">Sudah Absen</span>
                                            @else
                                                <span class="btn btn-danger btn-sm">Belum Absen</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/edit-orangtua">
                                                <button type="button" class="btn btn-primary">Edit</button>
                                            </a>
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
    <!-- jQuery harus dimuat pertama kali -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    <!-- DataTables Initialization -->
    <script>
        $(document).ready(function() {
            $('#orangtauTabel').DataTable();
        });
    </script>
@endsection
