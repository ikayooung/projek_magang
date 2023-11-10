<?php

namespace App\Imports;

use App\Models\Transaksi;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;


class KeuanganImport implements ToModel, WithStartRow
{
    /**
     * @param Collection $collection
     */

    public function startRow(): int
    {
        return 2; // Mulai membaca dari baris kedua (indeks 1)
    }

    function model(array $row)
    {
        if (!$row[0]) {
            return;
        }
        $tanggal_kirim = Date::excelToDateTimeObject($row[1]);
        $tanggal_terima = Date::excelToDateTimeObject($row[2]);

        return new Transaksi([
            'no_bill' => $row[0],
            'tanggal_kirim' => $tanggal_kirim,
            'tanggal_terima' => $tanggal_terima,
            'nama_penerima' => $row[3],
            'nama_kapal' => $row[4],
            'no_agenda' => $row[5],
            'no_invoice' => $row[6],
            'no_fp' => $row[7],
            'nama_perusahaan' => $row[8],
        ]);
    }
}
