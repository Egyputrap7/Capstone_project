<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class arsipKK extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $table = 'arsip_kks';

    protected $fillable =  [
        'nama', 'noKK', 'nik', 'alamat', 'RT', 'RW', 'kodePos', 'tglSurat', 'Camat', 'lurah'
    ];


    public function getRouteKeyName()
    {
        return 'id';
    }
}
