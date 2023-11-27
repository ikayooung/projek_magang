<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Customer extends Model
{
    use HasFactory;
    // use Searchable;

    protected $table = 'customer';
    protected $guarded = [];

    public function toSearchableArray()
    {
        return [
            'nama_perusahaan' => $this->nama_perusahaan,
        ];
    }
}
