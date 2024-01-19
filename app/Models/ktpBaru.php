<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ktpBaru extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $table = 'ktp_barus';

    protected $fillable =  [
        'jenisKTP', 'nama', 'noKK', 'nik', 'alamat', 'RT', 'RW', 'kodePos', 'tglSurat', 'Camat', 'lurah'
    ];


    public function getRouteKeyName()
    {
        return 'id';
    }
}
