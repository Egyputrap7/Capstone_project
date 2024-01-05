<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profilDesa;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.profilDesa.index', [
            'title' => 'Profil',
            'profil_desas' => profilDesa::latest()->paginate(8),
            'totalProfil' => profilDesa::count()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('dashboard.profilDesa.create', [
            'title' => 'Profil',
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'image|file|max:1024',
            'noProfil' => 'required|numeric',
            'judul' => 'required',
            'keterangan' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-image');
        }

        profilDesa::create($validatedData);

        return redirect('/dashboard/profil')->with('success', 'Surat berhasil ditambahkan!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show(profilDesa $profil)
    {
        return view('dashboard.profilDesa.show', [
            'title' => 'ProfilDesa',
            'active' => 'profil',
            'profil' => $profil,
        ]);
    }

    public function edit(profilDesa $profil)
    {
        return view('dashboard.profilDesa.edit', [
            'title' => 'ProfilDesa',
            'profil' => $profil,
        ]);
    }

    public function update(Request $request, profilDesa $profil)
    {
        $rules = [
            'image' => 'image|file|max:1024',
            'judul' => 'required',
            'keterangan' => 'required'
        ];

        

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-image');
        }

        profilDesa::where('id', $profil->id)
            ->update($validatedData);

        return redirect('/dashboard/profil')->with('success', 'Surat berhasil di edit!');
    }


    public function destroy(profilDesa $profil)
    {
        profilDesa::destroy($profil->id);

        return redirect('/dashboard/profil')->with('success', 'Surat berhasil dihapus!');
    }

    public function takedown(profilDesa $profil)
    {
        $profil->update(['published' => false]);

        return redirect()->route('profil.index')->with('success', 'Profil berhasil ditakedown.');
    }
    public function publish(profilDesa $profil)
    {
        $profil->update(['published' => true]);

        return redirect()->route('profil.index')->with('success', 'Profil berhasil dipublish.');
    }
}
