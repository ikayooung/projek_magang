<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\HistoryEnvelope;
use Illuminate\Http\Request;

class UmumController extends Controller
{
    public function index(Request $request)
    {
        $customer = (!$request->search) ? Customer::all() : Customer::search($request->search)->get();
        return view('customer.index', compact('customer'));
    }

    public function amplop_besar(Request $request)
    {
        $customer = (!$request->search) ? Customer::all() : Customer::search($request->search)->get();
        return view('customer.amplop-besar', compact('customer'));
    }

    function laporanAmplopKecil(Request $request)
    {
        $dari = ($request->dari) ? $request->dari :  date('Y-') . date('m') - 1 . '-' . date('d');
        $sampai = ($request->sampai) ? $request->sampai : date('Y-m-d');
        $laporan = HistoryEnvelope::where([
            'type' => 'amplop-kecil'
        ])
            ->whereBetween('id', [1, 100])
            ->get();

        $data = [
            'laporan' => $laporan,
            'dari' => $dari,
            'sampai' => $sampai
        ];

        return view('customer.laporan-amplop-kecil', $data);
    }

    function laporanAmplopBesar(Request $request)
    {
        $dari = ($request->dari) ? $request->dari :  date('Y-') . date('m') - 1 . '-' . date('d');
        $sampai = ($request->sampai) ? $request->sampai : date('Y-m-d');
        $laporan = HistoryEnvelope::where([
            'type' => 'amplop-besar'
        ])
            ->whereBetween('id', [1, 100])
            ->get();

        $data = [
            'laporan' => $laporan,
            'dari' => $dari,
            'sampai' => $sampai
        ];

        return view('customer.laporan-amplop-besar', $data);
    }
}
