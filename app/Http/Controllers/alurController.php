<?php

namespace App\Http\Controllers;

use App\Models\persyaratan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class alurController extends Controller
{
    public function index()
    {
        
        $persyaratans = persyaratan::where('judul', 'Alur')
            ->where('published', 1)
            ->get();

        return view('main.layanan.alur', [
            'syarats' => $persyaratans,
            'title' => 'Alur'
        ]);
    }
}
