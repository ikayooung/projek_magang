@extends('layouts.app')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Tambah Data Customer</h4>
<div class="card">
    <div class="row">
        <div class="col-md-8">
            <div class="card-body">
                <form action="{{ route('customer.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="kode_sap" class="form-label">Kode SAP</label>
                        <input type="text" name="kode_sap" id="kode_sap" class="form-control" autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="kode_crm" class="form-label">Kode CRM</label>
                        <input type="text" name="kode_crm" id="kode_crm" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                        <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="alamat_invoice" class="form-label">Alamat Invoice</label>
                        <input type="text" name="alamat_invoice" id="alamat_invoice" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="alamat2" class="form-label">Alamat2</label>
                        <input type="text" name="alamat2" id="alamat2" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="no_telepon" class="form-label">No Telepon</label>
                        <input type="text" name="no_telepon" id="no_telepon" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="no_faximile" class="form-label">No Faximile</label>
                        <input type="text" name="no_faximile" id="no_faximile" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="no_npwp_ktp" class="form-label">No NPWP / KTP</label>
                        <input type="text" name="no_npwp_ktp" id="no_npwp_ktp" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="contact_person" class="form-label">Contact Person</label>
                        <input type="text" name="contact_person" id="contact_person" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="no_contact_person" class="form-label">No Contact Person</label>
                        <input type="text" name="no_contact_person" id="no_contact_person" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
