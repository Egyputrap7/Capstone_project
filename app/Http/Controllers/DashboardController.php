<?php

namespace App\Http\Controllers;

use App\Models\ktpBaru;
use App\Models\kkBaru;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'ktp_barus' => ktpBaru::latest()->paginate(5),
            'kk_barus' => kkBaru::latest()->paginate(5),
            'totalKTP' => ktpBaru::count(),
            'totalKK' => kkBaru::count(),
        ]);
    }
}
