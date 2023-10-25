@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Data Customer</h4>
    </div>
    <div class="col-md-6 text-end m-auto">
        <a href="{{ route('customer.create') }}" class="btn btn-primary btn-sm">Tambah Data</a>
    </div>
</div>
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
                    <td>{{ $item->no_telpon }}</td>
                    <td>{{ $item->no_faximile }}</td>
                    <td>{{ $item->no_npwp_nik }}</td>
                    <td>{{ $item->contact_person }}</td>
                    <td>{{ $item->no_contact_person }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="{{ route('customer.edit', $item->id) }}">Edit</a>
                        <form action="{{ route('customer.destroy', $item->id) }}" method="POST" style="display: inline">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                        <a class="btn btn-sm btn-primary" href="">Print</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
