<?php

namespace App\Http\Controllers;

use App\Models\persyaratan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class syaratController extends Controller
{
    public function index()
    {
        
        $persyaratans = persyaratan::where('judul', 'Persyaratan')
            ->where('published', 1)
            ->get();

        return view('main.layanan.persyaratan', [
            'syarats' => $persyaratans,
            'title' => 'Alur'
        ]);
    }
}
