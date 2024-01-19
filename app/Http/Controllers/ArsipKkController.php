<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\arsipKK;
use Illuminate\Support\Facades\Storage;

class ArsipKkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.arsipkk.index', [
            'title' => 'Arsip KK',
            'arsip_kks' => arsipKK::latest()->paginate(8),
            'totalAKK' => arsipKK::count()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('dashboard.arsipkk.create', [
            'title' => 'Arsip KK',
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

        arsipKK::create($validatedData);

        return redirect('/dashboard/arsipkk')->with('success', 'Arsip KK Berhasil Ditambahkan!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show(arsipKK $akk)
    {
        return view('dashboard.arsipkk.show', [
            'title' => 'Arsip KK',
            'active' => 'akk',
            'akk' => $akk,
        ]);
    }

    public function edit(arsipKK $akk)
    {
        return view('dashboard.arsipkk.edit', [
            'title' => 'Arsip KK',
            'akk' => $akk,
        ]);
    }

    public function update(Request $request, arsipKK $akk)
    {
        $rules = [
            'nama' => 'required',
            'noKK' => 'required',
            'nik' => 'required',
            'alamat' => 'required',
            'RT' => 'required',
            'RW' => 'required',
            'kodePos' => 'required',
            'tglSurat' => 'required',
            'Camat' => 'required',
            'lurah' => 'required',
        ];


        $validatedData = $request->validate($rules);

        arsipKK::where('id', $akk->id)
            ->update($validatedData);

        return redirect('/dashboard/arsipkk')->with('success', 'Arsip KK Berhasil Diedit!');
    }


    public function destroy(arsipKK $akk)
    {
        arsipKK::destroy($akk->id);

        return redirect('/dashboard/arsipkk')->with('success', 'Arsip KK Berhasil Dihapus!');
    }

    public function cetak(arsipKK $akk)
    {
        $pdf = PDF::loadview('dashboard.arsipkk.cetak', [
            'title' => 'Cetak',
            'akk' => $akk,
        ])->setPaper('a4', 'potrait');
        return $pdf->stream('arsipKK_' . '' . $akk->id . '.pdf');
    }
}
