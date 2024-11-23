<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AlumniExport;
use App\Http\Controllers\Controller;
use App\Imports\DataAlumni;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|max:1020',
        ]);
        Excel::import(new DataAlumni, $request->file);
        return redirect()->route('pendaftar-alumni')->with('success', 'Import Success');
    }
    public function export()
    {
        $timestamp = Carbon::now()->format('Y-m-d_H-i-s'); // Format: Tahun-Bulan-Hari_Jam-Menit-Detik
        $filename = "alumni_{$timestamp}.xlsx";

        return Excel::download(new AlumniExport(), $filename);
    }

}
