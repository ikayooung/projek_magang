@extends('layouts.app')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Edit Data Transaksi</h4>
<div class="card">
    <div class="row">
        <div class="col-md-8">
            <div class="card-body">
                <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="no_bill" class="form-label">No Bill</label>
                        <input type="text" name="no_bill" id="no_bill" class="form-control" autofocus value="{{ $transaksi->no_bill }}">
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_kirim" class="form-label">Tanggal Kirim</label>
                        <input type="date" name="tanggal_kirim" id="tanggal_kirim" class="form-control" value="{{ $transaksi->tanggal_kirim }}">
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_terima" class="form-label">Tanggal Terima</label>
                        <input type="date" name="tanggal_terima" id="tanggal_terima" class="form-control" value="{{ $transaksi->tanggal_terima }}">
                    </div>

                    <div class="mb-3">
                        <label for="nama_penerima" class="form-label">Nama Penerima</label>
                        <input type="text" name="nama_penerima" id="nama_penerima" class="form-control" value="{{ $transaksi->nama_penerima }}">
                    </div>

                    <div class="mb-3">
                        <label for="nama_kapal" class="form-label">Nama Kapal</label>
                        <input type="text" name="nama_kapal" id="nama_kapal" class="form-control" value="{{ $transaksi->nama_kapal }}">
                    </div>

                    <div class="mb-3">
                        <label for="no_agenda" class="form-label">No Agenda</label>
                        <input type="text" name="no_agenda" id="no_agenda" class="form-control" value="{{ $transaksi->no_agenda }}">
                    </div>

                    <div class="mb-3">
                        <label for="no_invoice" class="form-label">No Invoice</label>
                        <input type="text" name="no_invoice" id="no_invoice" class="form-control" value="{{ $transaksi->no_invoice }}">
                    </div>

                    <div class="mb-3">
                        <label for="no_fp" class="form-label">No FP</label>
                        <input type="text" name="no_fp" id="no_fp" class="form-control" value="{{ $transaksi->no_fp }}">
                    </div>

                    <div class="mb-3">
                        <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                        <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" value="{{ $transaksi->nama_perusahaan }}">
                    </div>

                    <div class="mb-3">
                        <label for="no_resi" class="form-label">No Resi</label>
                        <input type="text" name="no_resi" id="no_resi" class="form-control" value="{{ $transaksi->nama_perusahaan }}">
                    </div>


                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
