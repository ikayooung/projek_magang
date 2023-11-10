<?php

namespace App\Http\Controllers;

use App\Exports\KeuanganExport;
use App\Imports\KeuanganImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class KeuanganController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        $file = $request->file('file');

        Excel::import(new KeuanganImport, $file);

        return redirect()->back()->with('success', 'Data berhasil diimpor.');
    }

    public function downloadFile()
    {
        return Storage::download('example_import_keuangan.xlsx');
    }
}
