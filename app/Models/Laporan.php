<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $fillable = [
        'judullaporan',
        'nolaporan',
        'tgllaporan',
        
    ];

    public function konfirmasi()
    {
        return $this->hasMany(Konfirmasi::class, 'idlaporan', 'id');
    }
}
