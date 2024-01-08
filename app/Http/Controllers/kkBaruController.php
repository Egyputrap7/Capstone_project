<?php

namespace App\Http\Controllers;

use App\Models\Domisili;
use Illuminate\Http\Request;
use PDF;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class kkBaruController extends Controller
{
    public function index()
    {
        return view('main.newKk', [
            'title' => 'newKk',
        ]);
    }
}
