<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\beritaDesa;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.beritaDesa.index', [
            'title' => 'Berita',
            'berita_desas' => beritaDesa::latest()->paginate(8),
            'totalBerita' => beritaDesa::count()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('dashboard.beritaDesa.create', [
            'title' => 'Berita',
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'image|file|max:1024',
            'noBerita' => 'required|numeric',
            'judul' => 'required',
            'keterangan' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-image');
        }

        beritaDesa::create($validatedData);

        return redirect('/dashboard/berita')->with('success', 'Berita Desa Berhasil Ditambahkan!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show(beritaDesa $berita)
    {
        return view('dashboard.beritaDesa.show', [
            'title' => 'BeritaDesa',
            'active' => 'berita',
            'berita' => $berita,
        ]);
    }

    public function edit(beritaDesa $berita)
    {
        return view('dashboard.beritaDesa.edit', [
            'title' => 'BeritaDesa',
            'berita' => $berita,
        ]);
    }

    public function update(Request $request, beritaDesa $berita)
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

        beritaDesa::where('id', $berita->id)
            ->update($validatedData);

        return redirect('/dashboard/berita')->with('success', 'Berita Desa Berhasil Diedit!');
    }


    public function destroy(beritaDesa $berita)
    {
        beritaDesa::destroy($berita->id);

        return redirect('/dashboard/berita')->with('success', 'Berita Desa Berhasil Dihapus!');
    }

    public function takedown(beritaDesa $berita)
    {
        $berita->update(['published' => false]);

        return redirect()->route('berita.index')->with('success', 'Berita Desa Berhasil Ditakedown!');
    }
    public function publish(beritaDesa $berita)
    {
        $berita->update(['published' => true]);

        return redirect()->route('berita.index')->with('success', 'Berita Desa Berhasil Dipublish!');
    }
}
