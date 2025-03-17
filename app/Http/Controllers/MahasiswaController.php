<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function mahasiswa()
    {
        $data = Mahasiswa::all();
        return view('frontend.table-mahasiswa', compact('data'));
    }

    public function edit($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        return view('frontend.edit-mahasiswa', compact('mahasiswa'));
    }

    public function update(Request $request, $nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        // Validasi input
        $request->validate([
            'nama' => 'required',
            'nama_orang_tua' => 'required',
            'nim' => 'required',
            'nik' => 'required',
            'email' => 'required|email',
            'no_telepon' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'jurusan' => 'required',
            'ipk' => 'required|numeric',
            'foto' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        // Update data mahasiswa
        $mahasiswa->update([
            'nama' => $request->nama,
            'nama_orang_tua' => $request->nama_orang_tua,
            'nim' => $request->nim,
            'nik' => $request->nik,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'ttl' => $request->ttl,
            'alamat' => $request->alamat,
            'jurusan' => $request->jurusan,
            'ipk' => $request->ipk,
        ]);

        // Upload foto jika ada file baru
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/foto-mahasiswa'), $filename);
            $mahasiswa->update(['foto' => $filename]);
        }


        return redirect('/mahasiswa')->with('success', 'Data Mahasiswa berhasil diperbarui');
    }


    public function absent($nim)
    {
        $data = Mahasiswa::where('nim', $nim)->first();
        $data->update([
            'status' => true
        ]);
        $data->save();
        return redirect('/mahasiswa');
    }

    public function absentOut($nim)
    {
        $data = Mahasiswa::where('nim', $nim)->first();
        $data->update([
            'status' => false
        ]);
        $data->save();
        return redirect('/mahasiswa');
    }
}
