<?php

namespace App\Http\Controllers;

use App\Models\ktpBaru;
use Illuminate\Http\Request;


class ktpBaruController extends Controller
{
    public function index()
    {
        return view('main.newKtp', [
            'title' => 'KTPBARU',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenisKTP' => 'required|max:255',
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

        KtpBaru::create($validatedData);

        return redirect('/main/newKtp')->with('success', 'Surat Berhasil Ditambahkan!');
    }

}