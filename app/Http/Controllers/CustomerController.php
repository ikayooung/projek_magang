<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\HistoryEnvelope;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $fpdf;

    function __construct()
    {
        $this->fpdf = new Fpdf();
    }
    public function index(Request $request)
    {
        $customer = (!$request->search) ? Customer::all() : Customer::search($request->search)->get();
        return view('customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('customer.create');
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

        return redirect()->route('umum.amplop-kecil');
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
        Customer::find($id)->update([
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

        return redirect()->back()->with('success', 'Update data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Customer::find($id)->delete();
        return redirect()->back()->with('success', 'Hapus data berhasil!');
    }


    function upLaporan($id, $type)
    {
        $up = HistoryEnvelope::create([
            'id_customer' => $id,
            'tanggal' => date('Y-m-d'),
            'type' => $type
        ]);

        if ($up) {
            return True;
        }
        return False;
    }

    function print($id)
    {
        $customer = Customer::find($id);
        $this->upLaporan($id, 'amplop-kecil');
        return view('customer.print', compact('customer'));
    }

    function PrintAmplopBesar(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $customer = DB::table('customer')->whereIn('id', [1, 2, 3, 4, 5])->get();

        foreach ($customer as $c) {
            $this->upLaporan($c->id, 'amplop-besar');
        }

        $data = [
            'customer' => $customer
        ];
        return view('customer.print-amplop-besar', $data);
    }

    function print_not_use($id)
    {
        $customer = Customer::find($id);

        $this->fpdf->AddPage('L', 'A4');
        $this->fpdf->image('assets/img/LOGO_PBKI.png', 10, 10, 50);
        $this->fpdf->image('assets/img/LOGO_BKI.png', 257, 5, 30);

        // $this->fpdf->SetMargins(10, 300, 10);
        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Ln(30);
        // $this->fpdf->Cell(40, 10, 'PERUSAHAAN', 0, 0);
        $this->fpdf->Cell(70, 10, "$customer->nama_perusahaan", 0, 1);
        // $this->fpdf->Cell(40, 10, 'ALAMAT', 0, 0);
        $this->fpdf->MultiCell($this->fpdf->GetPageWidth() - 100, 10, "$customer->alamat_invoice", 0);
        // $this->fpdf->Cell(40, 10, 'NO HP', 0, 0);
        $this->fpdf->Cell(70, 10, "$customer->no_telepon");

        $this->fpdf->Line(10, $this->fpdf->GetPageHeight() - 90, $this->fpdf->GetPageWidth() - 10, $this->fpdf->GetPageHeight() - 90);

        $this->fpdf->Cell(0, $this->fpdf->GetY() + 10, '', 0, 1);
        $this->fpdf->Cell(10, 10, 'PT BIRO KLASIFIKASI INDONESIA (Persero)', 0, 1);
        $this->fpdf->Cell(10, 10, 'Cabang Utama Klas Samarinda', 0, 1);
        $this->fpdf->SetFont('Arial', '', 12);
        $this->fpdf->Cell(10, 10, 'Jl. Letjend M.T Haryono No. 199, Air Putih', 0, 1);
        $this->fpdf->Cell(10, 10, 'Samarinda 75126', 0, 1);
        $this->fpdf->Cell(10, 10, 'Indonesia', 0, 1);

        $this->fpdf->SetLeftMargin($this->fpdf->GetPageWidth() - 100);
        $this->fpdf->Image('assets/img/icons/phone-call.png', $this->fpdf->GetX() - 50, $this->fpdf->GetY() - 45, 5);
        $this->fpdf->Text($this->fpdf->GetX() - 40, $this->fpdf->GetY() - 41, '(+62-0541) 412103, 412104, 412105, 412106');
        $this->fpdf->Image('assets/img/icons/email.png', $this->fpdf->GetX() - 50, $this->fpdf->GetY() - 35, 5);
        $this->fpdf->Text($this->fpdf->GetX() - 40, $this->fpdf->GetY() - 31, '(+62-0541) 412107');
        $this->fpdf->Image('assets/img/icons/printer.png', $this->fpdf->GetX() - 50, $this->fpdf->GetY() - 25, 5);
        $this->fpdf->Text($this->fpdf->GetX() - 40, $this->fpdf->GetY() - 21, 'sd@bki.co.id');

        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Text($this->fpdf->GetX() + 45, $this->fpdf->GetY() - 31, 'www.bki.co.id');

        $this->fpdf->Output('D', "$customer->nama_perusahaan.pdf");
        exit;
    }
}
