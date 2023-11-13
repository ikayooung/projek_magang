@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light"></span> Data Invoice
        </h4>
    </div>
    <div class="col-md-6 d-flex justify-content-end align-items-center">
        @livewire('import-keuangan')
        <a href="{{ route('transaksi.create') }}" class="btn btn-primary btn-sm ms-2">Tambah Data</a>
    </div>
</div>

<x-_alert/>

<div class="card p-4">
    <div class="table-responsive text-nowrap">
        <table class="datatable table py-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Bill</th>
                    <th>Tanggal Kirim</th>
                    <th>Tanggal Terima</th>
                    <th>Nama Penerima</th>
                    <th>Nama Kapal</th>
                    <th>No Agenda</th>
                    <th>No Invoice</th>
                    <th>No FP</th>
                    <th>Perusahaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($transaksi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->no_bill }}</td>
                    <td>{{ $item->tanggal_kirim }}</td>
                    <td>{{ $item->tanggal_terima }}</td>
                    <td>{{ $item->nama_penerima }}</td>
                    <td>{{ $item->nama_kapal }}</td>
                    <td>{{ $item->no_agenda }}</td>
                    <td>{{ $item->no_invoice }}</td>
                    <td>{{ $item->no_fp }}</td>
                    <td>{{ $item->nama_perusahaan }}</td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="{{ route('transaksi.edit', $item->id) }}">Edit</a>
                        <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST" style="display: inline">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
