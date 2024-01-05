<?php

namespace App\Http\Controllers;

use App\Models\profilDesa;
use Illuminate\Http\Request;
use PDF;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class sejarahController extends Controller
{
    public function index()
    {
        
        $profilDesas = ProfilDesa::where('judul', 'Sejarah')
            ->where('published', 1)
            ->get();

        return view('profilDesa.sejarah', [
            'profil_desas' => $profilDesas,
            'title' => 'sejarah'
        ]);
    }
}
