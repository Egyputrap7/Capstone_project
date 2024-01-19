<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kkBaru;
use App\Models\arsipKK;
use Illuminate\Support\Facades\Storage;

class KkAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.kkAdmin.index', [
            'title' => 'KK',
            'kk_barus' => kkBaru::latest()->paginate(8),
            'totalKK' => kkBaru::count()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('dashboard.kkAdmin.create', [
            'title' => 'KK',
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

        kkBaru::create($validatedData);

        return redirect('/dashboard/kk')->with('success', 'KK Berhasil Ditambahkan!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show(kkBaru $kk)
    {
        return view('dashboard.kkAdmin.show', [
            'title' => 'KK',
            'active' => 'kk',
            'kk' => $kk,
        ]);
    }

    public function edit(kkBaru $kk)
    {
        return view('dashboard.kkAdmin.edit', [
            'title' => 'KK',
            'kk' => $kk,
        ]);
    }

    public function update(Request $request, kkBaru $kk)
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

        kkBaru::where('id', $kk->id)
            ->update($validatedData);

        return redirect('/dashboard/kk')->with('success', 'KK Berhasil Diedit!');
    }


    public function destroy(kkBaru $kk)
    {
        kkBaru::destroy($kk->id);

        return redirect('/dashboard/kk')->with('success', 'KK Berhasil Dihapus!');
    }

    public function cetak(kkBaru $kk)
    {
        $pdf = PDF::loadview('dashboard.kkAdmin.cetak', [
            'title' => 'Cetak',
            'kk' => $kk,
        ])->setPaper('a4', 'potrait');
        return $pdf->stream('kkBaru_' . '' . $kk->id . '.pdf');
    }

    public function terima(kkBaru $kk)
    {
        $kk->update(['status' => 'accepted']);

        arsipKK::create([
            'nama' => $kk->nama,
            'noKK' => $kk->noKK,
            'nik' => $kk->nik,
            'alamat' => $kk->alamat,
            'RT' => $kk->RT,
            'RW' => $kk->RW,
            'kodePos' => $kk->kodePos,
            'tglSurat' => $kk->tglSurat,
            'Camat' => $kk->Camat,
            'lurah' => $kk->lurah,
        ]);

        $kk->delete();

        return redirect('/dashboard/kk')->with('success', 'Permohonan Telah Diterima!');
    }
}
