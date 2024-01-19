<?php

namespace App\Http\Controllers;

use App\Models\kkBaru;
use Illuminate\Http\Request;


class kkBaruController extends Controller
{
    public function index()
    {
        return view('main.newKk', [
            'title' => 'KKBARU',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'noKK' => 'required|numeric',
            'nik' => 'required|numeric',
            'alamat' => 'required|max:255',
            'RT' => 'required|numeric',
            'RW' => 'required|numeric',
            'kodePos' => 'required|numeric',
            'tglSurat' => 'required|date',
            'Camat' => 'required|max:255',
            'lurah' => 'required|max:255',
        ]);

        KkBaru::create($validatedData);

        return redirect('/main/newKk')->with('success', 'Surat Berhasil Ditambahkan!');
    }

}