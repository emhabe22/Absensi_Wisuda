<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
