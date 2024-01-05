<?php

namespace App\Http\Controllers;

use App\Models\persyaratan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PersyaratanController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.persyaratan.index', [
            'title' => 'Syarat',
            'persyaratans' => persyaratan::latest()->paginate(8),
            'totalPersyaratan' => persyaratan::count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.persyaratan.create', [
            'title' => 'Syarat',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'noSyarat' => 'required|numeric',
            'judul' => 'required',
            'keterangan' => 'required',
            'penulis' => 'required'
        ]);

        persyaratan::create($validatedData);

        return redirect('/dashboard/syarat')->with('success', 'Surat berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(persyaratan $syarat)
    {
        return view('dashboard.persyaratan.show', [
            'title' => 'Persyaratan',
            'active' => 'syarat',
            'syarat' => $syarat,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(persyaratan $syarat)
    {
        return view('dashboard.persyaratan.edit', [
            'title' => 'Persyaratan',
            'syarat' => $syarat,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     */
    public function update(Request $request, persyaratan $syarat)
    {
        $rules = [
            'judul' => 'required',
            'keterangan' => 'required',
            'penulis' => 'required'
        ];

      

        $validatedData = $request->validate($rules);

        persyaratan::where('id', $syarat->id)
            ->update($validatedData);

        return redirect('/dashboard/syarat')->with('success', 'Surat berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     * @return \Illuminate\Http\Response
     */
    public function destroy(persyaratan $syarat)
    {
        persyaratan::destroy($syarat->id);

        return redirect('/dashboard/syarat')->with('success', 'Surat berhasil dihapus!');
    }

    public function takedown(persyaratan $syarat)
    {
        $syarat->update(['published' => false]);

        return redirect()->route('syarat.index')->with('success', 'Profil berhasil ditakedown.');
    }
    public function publish(persyaratan $syarat)
    {
        $syarat->update(['published' => true]);

        return redirect()->route('syarat.index')->with('success', 'Profil berhasil dipublish.');
    }
}

