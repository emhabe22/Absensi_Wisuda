@extends('frontend.dashboard')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Edit Mahasiswa</div>
        </div>

        <div class="row">
            <div class="col-xl-11 mx-auto">
                <h6 class="mb-0 text-uppercase">Form Edit Mahasiswa</h6>
                <hr>
                <div class="card border-top border-0 border-4 border-info">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <form action="{{ route('mahasiswa.update', $mahasiswa->nim) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Foto</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="foto">
                                        <img src="{{ asset('uploads/' . $mahasiswa->foto) }}" width="100" class="mt-2">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama" value="{{ $mahasiswa->nama }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Nama Orang Tua</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama_orang_tua" value="{{ $mahasiswa->nama_orang_tua }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">NIM</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nim" value="{{ $mahasiswa->nim }}" readonly>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">NIK</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nik" value="{{ $mahasiswa->nik }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email" value="{{ $mahasiswa->email }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">No Telepon</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="no_hp" value="{{ $mahasiswa->no_hp }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Tempat, Tanggal Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="ttl" value="{{ $mahasiswa->ttl }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="alamat" rows="3">{{ $mahasiswa->alamat }}</textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Jurusan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="jurusan" value="{{ $mahasiswa->jurusan }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">IPK</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="ipk" value="{{ $mahasiswa->ipk }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-info px-5">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
