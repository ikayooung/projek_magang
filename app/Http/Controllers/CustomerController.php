<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $customer = Customer::all();
        return view ('customer.index', compact ('customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Customer::create([
            'kode_sap' => $request->kode_sap,
            'kode_crm' => $request->kode_crm,
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat_invoice' => $request->alamat_invoice,
            'alamat2' => $request->alamat2,
            'no_telepon' => $request->no_telepon,
            'no_faximile' => $request->no_faximile,
            'no_npwp_ktp' => $request->no_npwp_ktp,
            'contact_person' => $request->contact_person,
            'no_contact_person' => $request->no_contact_person,
            'email' => $request->email,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('customer.index');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
