<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\beritaDesa;

class showBeritaController extends Controller
{
    // public function index()
    // {
    //     return view('main.detailBerita', [
    //         'title' => 'detailBerita',
    //     ]);
    // }

    // public function show(beritaDesa $detailBerita)
    // {
    //     return view('main.detailBerita', [
    //         'berita' => $detailBerita,
    //         'title' => 'Detail Berita',
    //     ]);
    // }

    public function index()
{
    $berita_desas = beritaDesa::where('judul', 'Keterangan')
        ->where('published', 1)
        ->get();

    return view('main.detailBerita', [
        'detailBeritas' => $berita_desas, // Perbaikan variabel menjadi detailBeritas
        'title' => 'Alur'
    ]);
}
}
