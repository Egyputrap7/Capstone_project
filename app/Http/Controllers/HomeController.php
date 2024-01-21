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

    public function show(beritaDesa $berita)
    {
        return view('main.detailBerita', [
            'title' => 'BeritaDesa',
            'active' => 'berita',
            'berita' => $berita,
        ]);
    }
}
