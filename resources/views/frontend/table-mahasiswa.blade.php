@extends('frontend.dashboard')
@section('content')
    <!--Data Tables -->
    <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    {{-- end --}}

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
                    <div class="ms-auto">
                        <div class="btn-group">
                           
                            <!-- <button type="button"
                                class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                                data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                            </button> -->
                            <!-- <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                                    href="javascript:;">Action</a>
                                <a class="dropdown-item" href="javascript:;">Another action</a>
                                <a class="dropdown-item" href="javascript:;">Something else here</a>
                                <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                                    link</a>
                            </div> -->
                        </div>
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
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Nama Orang Tua</th>
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
                                        <img src="{{ asset('storage/' . $mhs->foto) }}" alt="Foto Mahasiswa" width="100">
                                    </td>
                                       <td>{{$mhs->nama}}</td>
                                       <td>{{$mhs->nama}}</td>
                                       <td>{{$mhs->nim}}</td>
                                       <td>{{$mhs->nik}}</td>
                                       <td>{{$mhs->email}}</td>
                                       <td>{{$mhs->no_hp}}</td>
                                       <td>{{$mhs->tempat_tanggal_lahir}}</td>
                                       <td>{{$mhs->alamat}}</td>
                                       <td>{{$mhs->jurusan}}</td>
                                       <td>{{$mhs->ipk}}</td>
                                       <td>
    @if ($mhs->status == true)
        <span class="btn btn-success btn-sm">Sudah Absen</span>
    @else
        <span class="btn btn-danger btn-sm">Belum Absen</span>
    @endif
</td>
<td>
<a href="/edit-mahasiswa">
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
        <!--end page-content-wrapper-->
    </div>

    {{-- js --}}
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    {{-- <script>
		$(document).ready(function () {
			//Default data table
			$('#example').DataTable();
			var table = $('#example2').DataTable({
				lengthChange: false,
				buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
			});
			table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
		});
	</script> --}}
@endsection
