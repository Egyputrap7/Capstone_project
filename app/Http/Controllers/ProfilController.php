<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profilDesa;

class ProfilController extends Controller
{
    public function index()
    {
        return view('dashboard.profilDesa.index', [
            'title' => 'ProfilDesa',
            'profil_desas' => profilDesa::latest()->paginate(8),
        ]);
    }
    public function create()
    {
        return view('dashboard.profilDesa.create', [
            'title' => 'ProfilDesa',
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'image|file|max:1024',
            'noProfil' => 'required|numeric',
            'keterangan' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-image');
        }

        profilDesa::create($validatedData);

        return redirect('/dashboard/profilDesa')->with('success', 'Surat berhasil ditambahkan!');
    }
    public function show(profilDesa $profil)
    {
        return view('dashboard.profilDesa.index', [
            'title' => 'ProfilDesa',
            'profil' => $profil,
        ]);
    }
    public function destroy(profilDesa $profil)
    {
        profilDesa::destroy($profil->noProfil);

        return redirect('/dashboard/profilDesa')->with('success', 'Surat berhasil dihapus!');
    }
}
