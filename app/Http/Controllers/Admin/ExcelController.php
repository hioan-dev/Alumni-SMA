<?php

namespace App\Http\Controllers\Admin;

use App\Exports\AlumniExport;
use App\Http\Controllers\Controller;
use App\Imports\DataAlumni;
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
        return redirect()->back()->with('success', 'Import Success');
    }
    public function export()
    {
        return Excel::download(new AlumniExport(), 'alumni.xlsx');
    }
}