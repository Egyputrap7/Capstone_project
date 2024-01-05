<?php

namespace App\Http\Controllers;

use App\Models\profilDesa;
use Illuminate\Http\Request;
use PDF;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class visiController extends Controller
{
    public function index()
    {
        
        $profilDesas = ProfilDesa::where('judul', 'Visi Misi')
            ->where('published', 1)
            ->get();

        return view('profilDesa.visi', [
            'profil_desas' => $profilDesas,
            'title' => 'Profil'
        ]);
    }
}
