<?php

namespace App\Http\Controllers;

use App\Exports\KeuanganExport;
use App\Imports\KeuanganImport;
use App\Models\Transaksi;
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

    function laporan(Request $request)
    {
        if ($request->bulan && $request->tahun) {
            $transaksi = Transaksi::whereMonth('tanggal_kirim', $request->bulan)->whereYear('tanggal_kirim', $request->tahun)->get();
        } else {
            $transaksi = Transaksi::all();
        }

        $bulan = ($request->bulan) ? $request->bulan : date('m');
        $tahun = ($request->tahun) ? $request->tahun : date('Y');
        $data = [
            'transaksi' => $transaksi,
            'bulanSelected' => $bulan,
            'tahunSelected' => $tahun
        ];
        // dd($bulan);
        return view('keuangan.laporan', $data);
    }
}
