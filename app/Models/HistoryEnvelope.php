<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryEnvelope extends Model
{
    use HasFactory;

    protected $table = 'history_envelope';
    protected $guarded = [];

    public $timestamps = false;

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_customer', 'id');
    }
}
