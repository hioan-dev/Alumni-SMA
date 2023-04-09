<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumni;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TabelAlumniController extends Controller
{
    public function index()
    {
        $alumni = Alumni::where('approved', 1)->get();
        return view('admin.table-alumni.table-alumni', compact('alumni'));
    }

    public function create()
    {
        return view('admin.table-alumni.tambah-alumni');
    }

    public function store(Request $request)
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
            'foto' => 'required|image|mimes:jpeg,png,jpg',
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

        $foto = $request->file('foto');

        if ($request->hasFile('foto')) {
            $alumni['foto'] =  $foto->store('public/alumni');
        } else {
            return $request;
            $alumni['foto'] = '';
        }

        $alumni['user_id'] = Auth::id();
        unset($alumni['universitas']);
        unset($alumni['jurusan']);

        Alumni::create($alumni);

        return redirect()->route('table-alumni.index')->with('success', 'Data berhasil ditambahkan');
    }


    public function show($id)
    {
        $data_alumni = Alumni::find($id);
        $data_alumni['pendidikan'] = json_decode($data_alumni['pendidikan']);

        return view('admin.table-alumni.info-alumni', [
            'data_alumni' => $data_alumni
        ]);
    }

    public function edit($id)
    {
        $data_alumni = Alumni::find($id);
        $data_alumni['pendidikan'] = json_decode($data_alumni['pendidikan']);

        return view('admin.table-alumni.edit', [
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
        return redirect()->route('table-alumni.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        Alumni::find($id)->delete();
        return redirect()->route('table-alumni.index')->with('success', 'Data berhasil dihapus');
    }
}
