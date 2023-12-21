<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $guarded = [];

    protected $fillable = [
        'no_bill',
        'tanggal_kirim',
        'tanggal_terima',
        'nama_penerima',
        'nama_kapal',
        'no_agenda',
        'no_invoice',
        'no_fp',
        'nama_perusahaan',
        'no_resi',
    ];
}
