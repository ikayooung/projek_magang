@extends('layouts.app')
@section('content')
<div class="col-md-6">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Laporan</h4>
</div>

<div class="col-md-7">
    <div class="card">
        <div class="card-body">
            <form action="" method="get" class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="bulan" class="form-label">Bulan</label>
                        <select name="bulan" id="bulan" class="form-select">
                            <?php
                                $bulan = [
                                    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
                                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                                ];
                            ?>
                            @foreach($bulan as $m)
                                <option value="{{ $loop->iteration }}" {{($bulanSelected == $loop->iteration) ? 'selected' : ''}}>
                                    {{$m}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <?php
                        $currentYear = date('Y');
                        $years = range($currentYear, $currentYear - 5);
                        $years = array_reverse($years);
                        ?>
                        <label for="tahun" class="form-label">Tahun</label>
                        <select name="tahun" id="tahun" class="form-select">
                            @foreach ($years as $year): ?>
                                <option value="{{ $year }}" {{($tahunSelected == $year) ? 'selected' : ''}}>{{ $year }}</option>
                            @endforeach; ?>
                        </select>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary mt-4">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-12 mt-4">
    <div class="card">
        <div class="card-body">
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
    </div>
</div>
@endsection