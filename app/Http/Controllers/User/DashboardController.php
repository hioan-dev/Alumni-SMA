<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumni;
use App\Models\CalonKetua;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class DashboardController extends Controller
{
    public function index()
    {
        Auth::id();
        $data_alumni = Alumni::where('user_id', Auth::id())->first();
        if ($data_alumni != null) {
            $data_alumni['pendidikan'] = json_decode($data_alumni['pendidikan']);
        }

        return view('user.dashboard', [
            'data_alumni' => $data_alumni
        ]);
    }

    public function edit($id)
    {
        $data_alumni = Alumni::find($id);
        $data_alumni['pendidikan'] = json_decode($data_alumni['pendidikan']);
        return view('user.edit', [
            'data_alumni' => $data_alumni
        ]);
    }

    public function update(Request $request, $id)
    {
        $oldAlumni = Alumni::find($id);
        $alumni = $request->all();
        $fotoName = $oldAlumni->foto;

        if (request()->hasFile('foto')) {
            $fileCheck = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        } else {
            $fileCheck = 'max:2048|image|mimes:jpeg,png,jpg,gif,svg';
        }

        $request->validate([
            'nama_lengkap' => 'required',
            'tahun_lulus' => 'required',
            'kelas' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'teman_sebangku' => 'required',
            'alamat' => 'required',
            'jenkel' => 'required',
            'ukuran_baju' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'foto' => $fileCheck,
            'pekerjaan' => 'required',
            'perusahaan' => 'required',
        ]);

        if (request()->hasFile('foto')) {
            if (Storage::exists('public/alumni/' . $oldAlumni->foto)) {
                Storage::delete('public/alumni/' . $oldAlumni->foto);
            }
            $foto = $request->file('foto');
            $fileName = time() . '.' . $foto->getClientOriginalExtension();
            $fotoName = $foto->storeAs('public/alumni', $fileName);
        }

        $pendidikan = $request->pendidikan;
        $universitas = $request->universitas;
        $jurusan = $request->jurusan;

        $data_pendidikan = [];
        foreach ($pendidikan as $i => $data) {
            if ($universitas[$i] && $jurusan[$i]) {
                array_push($data_pendidikan, [
                    'pendidikan' => $data,
                    'universitas' => $universitas[$i],
                    'jurusan' => $jurusan[$i]
                ]);
            }
        }

        $alumni['pendidikan'] = json_encode($data_pendidikan);
        $alumni['foto'] = $fotoName;
        unset($alumni['universitas']);
        unset($alumni['jurusan']);

        $oldAlumni->update($alumni);
        return redirect()->route('user-dashboard')->with('success', 'Data berhasil diubah');
    }

    public function pendaftaran()
    {
        $calon_ketua = CalonKetua::where('user_id', Auth::id())->first();

        if (empty($calon_ketua)) {
            return redirect()->route('user-dashboard')->with('error', 'Anda belum mengisi data diri');
        }

        return view('user.pendaftaran-ketua.index', [
            'calon_ketua' => $calon_ketua
        ]);
    }
}
