<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\arsipKTP;
use Illuminate\Support\Facades\Storage;

class ArsipKtpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.arsipktp.index', [
            'title' => 'Arsip KTP',
            'arsip_ktps' => arsipKTP::latest()->paginate(8),
            'totalAKTP' => arsipKTP::count()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('dashboard.arsipktp.create', [
            'title' => 'Arsip KTP',
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

        arsipKTP::create($validatedData);

        return redirect('/dashboard/arsipktp')->with('success', 'KTP Berhasil Ditambahkan!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show(arsipKTP $aktp)
    {
        return view('dashboard.arsipktp.show', [
            'title' => 'Arsip KTP',
            'active' => 'aktp',
            'aktp' => $aktp,
        ]);
    }

    public function edit(arsipKTP $aktp)
    {
        return view('dashboard.arsipktp.edit', [
            'title' => 'Arsip KTP',
            'aktp' => $aktp,
        ]);
    }

    public function update(Request $request, arsipKTP $aktp)
    {
        $rules = [
            'jenisKTP' => 'required',
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

        arsipKTP::where('id', $aktp->id)
            ->update($validatedData);

        return redirect('/dashboard/arsipktp')->with('success', 'Arsip KTP Berhasil Diedit!');
    }


    public function destroy(arsipKTP $aktp)
    {
        arsipKTP::destroy($aktp->id);

        return redirect('/dashboard/arsipktp')->with('success', 'Arsip KTP Berhasil Dihapus!');
    }

    public function cetak(arsipKTP $aktp)
    {
        $pdf = PDF::loadview('dashboard.arsipktp.cetak', [
            'title' => 'Cetak',
            'ktp' => $aktp,
        ])->setPaper('a4', 'potrait');
        return $pdf->stream('arsipKTP_' . '' . $aktp->id . '.pdf');
    }
}
