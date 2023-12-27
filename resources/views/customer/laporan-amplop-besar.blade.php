@extends('layouts.app')
@section('content')
<div class="col-md-6">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Laporan</h4>
</div>

<div class="col-md-7">
    <div class="card">
        <div class="card-body">
            <form action="" method="get" class="form-group">
                @csrf
                <div class="row">
                    <div class="col-auto">
                        <label for="dari">Dari</label>
                        <input type="date" value="{{$dari}}" class="form-control" required name="dari">
                    </div>
                    <div class="col-auto">
                        <label for="sampai">Sampai</label>
                        <input type="date" value="{{$sampai}}" class="form-control" required name="sampai">
                    </div>
                    <div class="col-auto mt-4">
                        <button class="btn btn-primary" type="submit">
                            <i class="bx bx-search"></i>
                            Seacrh
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-12 mt-4">
    <div class="card p-4">
        <div class="table-responsive text-nowrap">
            <table class="datatable table py-3">
                <thead>
                    <th>No</th>
                    <th>Nama Perusahaan</th>
                    <th>Tanggal Cetak</th>
                </thead>
                <tbody>
                    @foreach($laporan as $l)
                        <tr>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>
                                {{$l->customer->nama_perusahaan}}
                            </td>
                            <td>
                                {{$l->tanggal}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- <div class="card">
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Nama Perusahaan</th>
                        <th>Tanggal Cetak</th>
                    </thead>

                    <tbody>
                        @foreach($laporan as $l)
                            <tr>
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                <td>
                                    {{$l->customer->nama_perusahaan}}
                                </td>
                                <td>
                                    {{$l->tanggal}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}
</div>
@endsection
