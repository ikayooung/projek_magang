@extends('layouts.app')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Edit Data Customer</h4>
<div class="card">
    <div class="row">
        <div class="col-md-8">
            <div class="card-body">
                <form action="{{ route('customer.update', $customer->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="kode_sap" class="form-label">No Bill</label>
                        <input type="text" name="kode_sap" id="kode_sap" class="form-control" autofocus value="{{ $customer->kode_sap }}">
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_kirim" class="form-label">Tanggal Kirim</label>
                        <input type="date" name="tanggal_kirim" id="tanggal_kirim" class="form-control" value="{{ $customer->tanggal_kirim }}">
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_terima" class="form-label">Tanggal Terima</label>
                        <input type="date" name="tanggal_terima" id="tanggal_terima" class="form-control" value="{{ $customer->tanggal_terima }}">
                    </div>

                    <div class="mb-3">
                        <label for="nama_penerima" class="form-label">Nama Penerima</label>
                        <input type="text" name="nama_penerima" id="nama_penerima" class="form-control" value="{{ $customer->nama_penerima }}">
                    </div>

                    <div class="mb-3">
                        <label for="nama_kapal" class="form-label">Nama Kapal</label>
                        <input type="text" name="nama_kapal" id="nama_kapal" class="form-control" value="{{ $customer->nama_kapal }}">
                    </div>

                    <div class="mb-3">
                        <label for="no_agenda" class="form-label">No Agenda</label>
                        <input type="text" name="no_agenda" id="no_agenda" class="form-control" value="{{ $customer->no_agenda }}">
                    </div>

                    <div class="mb-3">
                        <label for="no_invoice" class="form-label">No Invoice</label>
                        <input type="text" name="no_invoice" id="no_invoice" class="form-control" value="{{ $customer->no_invoice }}">
                    </div>

                    <div class="mb-3">
                        <label for="no_fp" class="form-label">No FP</label>
                        <input type="text" name="no_fp" id="no_fp" class="form-control" value="{{ $customer->no_fp }}">
                    </div>

                    <div class="mb-3">
                        <label for="perusahaan" class="form-label">Nama Perusahaan</label>
                        <input type="text" name="perusahaan" id="perusahaan" class="form-control" value="{{ $customer->perusahaan }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
