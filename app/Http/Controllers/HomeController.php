<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\beritaDesa;

class HomeController extends Controller
{
    public function index()
    {
        $berita_desas = beritaDesa::latest()->paginate(8);

        return view('home', [
            'title' => 'Home',
            'berita_desas' => $berita_desas,
        ]);
    }

    // public function show(beritaDesa $berita)
    // {
    //     return view('main.detailBerita', [
    //         'title' => 'BeritaDesa',
    //         'active' => 'berita',
    //         'berita' => $berita,
    //     ]);
    // }

    public function showDetailBerita($noBerita)
{
    $berita = BeritaDesa::where('noBerita', $noBerita)
        ->where('published', 1)
        ->first();

    if (!$berita) {
        abort(404); // Tampilkan halaman 404 jika berita tidak ditemukan
    }

    return view('main.detailBerita', [
        'title' => 'Detail Berita',
        'berita' => $berita,
    ]);
}
}
