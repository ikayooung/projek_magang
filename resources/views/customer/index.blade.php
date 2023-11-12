@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Data Customer</h4>
    </div>
    <div class="col-md-6 text-end m-auto">
        <div class="row justify-content-end">
            <div class="col-auto">
                <form action="{{ route('customer.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
            <div class="col-auto">
                <a href="{{ route('customer.create') }}" class="btn btn-primary">Tambah Data</a>
            </div>
        </div>
    </div>
</div>
<x-_alert/>
<div class="card p-4">
    <div class="table-responsive text-nowrap">
        <table class="datatable table py-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode SAP</th>
                    <th>Kode CRM</th>
                    <th>Nama Perusahaan</th>
                    <th>Alamat Invoice</th>
                    <th>Alamat2</th>
                    <th>No. Telpon</th>
                    <th>No. Faximile</th>
                    <th>No. NPWP / NIK</th>
                    <th>Contact Person</th>
                    <th>No. Contact Person</th>
                    <th>Email</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($customer as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_sap }}</td>
                    <td>{{  $item->kode_crm }}</td>
                    <td>{{ $item->nama_perusahaan }}</td>
                    <td>{{ $item->alamat_invoice }}</td>
                    <td>{{ $item->alamat2 }}</td>
                    <td>{{ $item->no_telepon }}</td>
                    <td>{{ $item->no_faximile }}</td>
                    <td>{{ $item->no_npwp_ktp }}</td>
                    <td>{{ $item->contact_person }}</td>
                    <td>{{ $item->no_contact_person }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        <x-edit name="edit_customer" action="{{route('customer.update', $item->id)}}">
                            <div class="mb-3">
                                <label for="kode_sap" class="form-label">Kode SAP</label>
                                <input type="text" name="kode_sap" value="{{$item->kode_sap}}" id="kode_sap" class="form-control" autofocus>
                            </div>
        
                            <div class="mb-3">
                                <label for="kode_crm" class="form-label">Kode CRM</label>
                                <input type="text" name="kode_crm" value="{{$item->kode_crm}}" id="kode_crm" class="form-control">
                            </div>
        
                            <div class="mb-3">
                                <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                                <input type="text" name="nama_perusahaan" value="{{$item->nama_perusahaan}}" id="nama_perusahaan" class="form-control">
                            </div>
        
                            <div class="mb-3">
                                <label for="alamat_invoice" class="form-label">Alamat Invoice</label>
                                <input type="text" name="alamat_invoice" value="{{$item->alamat_invoice}}" id="alamat_invoice" class="form-control">
                            </div>
        
                            <div class="mb-3">
                                <label for="alamat2" class="form-label">Alamat2</label>
                                <input type="text" name="alamat2" value="{{$item->alamat2}}" id="alamat2" class="form-control">
                            </div>
        
                            <div class="mb-3">
                                <label for="no_telepon" class="form-label">No Telepon</label>
                                <input type="text" name="no_telepon" value="{{$item->no_telepon}}" id="no_telepon" class="form-control">
                            </div>
        
                            <div class="mb-3">
                                <label for="no_faximile" class="form-label">No Faximile</label>
                                <input type="text" name="no_faximile" value="{{$item->no_faximile}}" id="no_faximile" class="form-control">
                            </div>
        
                            <div class="mb-3">
                                <label for="no_npwp_ktp" class="form-label">No NPWP / KTP</label>
                                <input type="text" name="no_npwp_ktp" value="{{$item->no_npwp_ktp}}" id="no_npwp_ktp" class="form-control">
                            </div>
        
                            <div class="mb-3">
                                <label for="contact_person" class="form-label">Contact Person</label>
                                <input type="text" name="contact_person" value="{{$item->contact_person}}" id="contact_person" class="form-control">
                            </div>
        
                            <div class="mb-3">
                                <label for="no_contact_person" class="form-label">No Contact Person</label>
                                <input type="text" name="no_contact_person" value="{{$item->no_contact_person}}" id="no_contact_person" class="form-control">
                            </div>
        
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" value="{{$item->email}}" id="email" class="form-control">
                            </div>
        
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" name="keterangan" value="{{$item->keterangan}}" id="keterangan" class="form-control">
                            </div>
                        </x-edit>
                        <x-delete action="{{route('customer.delete', $item->id)}}"/>
                        <a class="btn btn-sm btn-primary" href="{{route('customer.print', $item->id)}}">Print</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
