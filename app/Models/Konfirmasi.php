<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Konfirmasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'idlaporan',
        'tujuan',
        'alamat',
        'tglkirim',
        'tglekspedisi',
        'token'
    ];

    public function laporan()
    {
        return $this->belongsTo(Laporan::class, 'idlaporan');
    }

    // protected static function booted()
    // {
    // static::creating(function ($model) {
    //     $model->token = Str::uuid();
    //     });
    // }



    
}
