<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class arsipKTP extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $table = 'arsip_ktps';

    protected $fillable =  [
        'jenisKTP', 'nama', 'noKK', 'nik', 'alamat', 'RT', 'RW', 'kodePos', 'tglSurat', 'Camat', 'lurah'
    ];


    public function getRouteKeyName()
    {
        return 'id';
    }
}
