@extends('frontend.dashboard')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- Breadcrumb -->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Tabel</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tabel Senat</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- End Breadcrumb -->

            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="mb-0">Data Senat</h4>
                    </div>
                    <hr />
                    <div class="table-responsive">
                        <table id="senatTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>UUID</th>
                                    <th>Foto</th>
                                    <th>Nama Senat</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $senat)
                                    <tr>
                                        <td>{{ $senat->uuid }}</td>
                                        <td>
                                            <img src="{{ $senat->foto ? asset('storage/senat/' . $senat->foto) : asset('assets/images/default-profile.png') }}"
                                                 width="80"
                                                 height="80"
                                                 class="img-thumbnail">
                                        </td>
                                        <td>{{ $senat->nama }}</td>
                                        <td>
                                            @if ($senat->status)
                                                <span class="btn btn-success btn-sm">Sudah Absen</span>
                                            @else
                                                <span class="btn btn-danger btn-sm">Belum Absen</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('/edit-senat/' . $senat->uuid) }}"
                                                class="btn btn-primary">Edit</a>
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
            $('#senatTable').DataTable();
        });
    </script>
@endsection
