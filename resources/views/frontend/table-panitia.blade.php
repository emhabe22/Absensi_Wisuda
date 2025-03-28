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
                            <li class="breadcrumb-item active" aria-current="page">Tabel Pantia</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="mb-0">Data Panitia</h4>
                    </div>
                    <hr />
                    <div class="table-responsive">
                        <table id="panitiaTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Seksi</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $panitia)
                                    <tr>
                                        <td>{{ $panitia->nama }}</td>
                                        <td>{{ $panitia->section }}</td>
                                        <td>
                                            @if ($panitia->status)
                                                <span class="btn btn-success btn-sm">Sudah Absen</span>
                                            @else
                                                <span class="btn btn-danger btn-sm">Belum Absen</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#">
                                                <button type="button" class="btn btn-primary">Edit</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
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
            $('#panitiaTable').DataTable();
        });
    </script>
@endsection
