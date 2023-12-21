<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('keuangan.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('keuangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Transaksi::create([
            'no_bill' => $request->no_bill,
            'tanggal_kirim' => $request->tanggal_kirim,
            'tanggal_terima' => $request->tanggal_terima,
            'nama_penerima' => $request->nama_penerima,
            'nama_kapal' => $request->nama_kapal,
            'no_agenda' => $request->no_agenda,
            'no_invoice' => $request->no_invoice,
            'no_fp' => $request->no_fp,
            'nama_perusahaan' => $request->nama_perusahaan,
            'no_resi' => $request->no_resi,
        ]);

        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
        $transaksi->find($transaksi);
        return view ('keuangan.edit', compact ('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
        $transaksi->update([
            'no_bill' => $request->no_bill,
            'tanggal_kirim' => $request->tanggal_kirim,
            'tanggal_terima' => $request->tanggal_terima,
            'nama_penerima' => $request->nama_penerima,
            'nama_kapal' => $request->nama_kapal,
            'no_agenda' => $request->no_agenda,
            'no_invoice' => $request->no_invoice,
            'no_fp' => $request->no_fp,
            'nama_perusahaan' => $request->nama_perusahaan,
            'no_resi' => $request->no_resi,
        ]);
        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
        $transaksi->delete();
        return redirect()->route('transaksi.index');
    }
}
