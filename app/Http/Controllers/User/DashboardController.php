<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumni;
use Illuminate\Support\Facades\Auth;



class DashboardController extends Controller
{
    public function index()
    {
        Auth::id();
        $data_alumni = Alumni::where('user_id', Auth::id())->first();
        if ($data_alumni != null) {
            $data_alumni['pendidikan'] = json_decode($data_alumni['pendidikan']);
        }

        return view('user.dashboard',[
            'data_alumni' => $data_alumni
        ]);
    }

    public function edit($id)
    {
        $data_alumni = Alumni::find($id);
        $data_alumni['pendidikan'] = json_decode($data_alumni['pendidikan']);
        return view('user.edit',[
            'data_alumni' => $data_alumni
        ]);
    }

    public function update(Request $request, $id)
    {
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
            'foto' => 'image|mimes:jpeg,png,jpg',
            'pekerjaan' => 'required',
            'approved' => 'required',
            'perusahaan' => 'required',

        ]);

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

        $alumni = $request->all();
        $alumni['pendidikan'] = json_encode($data_pendidikan);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tujuan_upload = 'foto';
            $file->move($tujuan_upload, $nama_file);
            $alumni['foto'] = $nama_file;
        }

        Alumni::find($id)->update($alumni);
        return redirect()->route('user.dashboard');
    }
}
