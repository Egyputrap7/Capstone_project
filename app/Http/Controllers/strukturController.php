<?php

namespace App\Http\Controllers;

use App\Models\profilDesa;
use Illuminate\Http\Request;
use PDF;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class strukturController extends Controller
{
    public function index()
    {
        
        $profilDesas = ProfilDesa::where('judul', 'Struktur Organisasi')
            ->where('published', 1)
            ->get();

        return view('profilDesa.struktur', [
            'profil_desas' => $profilDesas,
            'title' => 'Struktur Organisasi'
        ]);
    }
}
