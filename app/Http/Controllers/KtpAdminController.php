<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ktpBaru;
use App\Models\arsipKTP;
use PDF;
use Illuminate\Support\Facades\Storage;

class KtpAdminController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.ktpAdmin.index', [
            'title' => 'KTP',
            'ktp_barus' => ktpBaru::latest()->paginate(8),
            'totalKTP' => ktpBaru::count()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('dashboard.ktpAdmin.create', [
            'title' => 'KTP',
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

        return redirect('/dashboard/ktp')->with('success', 'Surat Berhasil Ditambahkan!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show(ktpBaru $ktp)
    {
        return view('dashboard.ktpAdmin.show', [
            'title' => 'KTP',
            'active' => 'ktp',
            'ktp' => $ktp,
        ]);
    }

    public function edit(ktpBaru $ktp)
    {
        return view('dashboard.ktpAdmin.edit', [
            'title' => 'KTP',
            'ktp' => $ktp,
        ]);
    }

    public function update(Request $request, ktpBaru $ktp)
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

        ktpBaru::where('id', $ktp->id)
            ->update($validatedData);

        return redirect('/dashboard/ktp')->with('success', 'KTP Berhasil Diedit!');
    }


    public function destroy(ktpBaru $ktp)
    {
        ktpBaru::destroy($ktp->id);

        return redirect('/dashboard/ktp')->with('success', 'KTP Berhasil Dihapus!');
    }

    public function cetak(ktpBaru $ktp)
    {
        ini_set('max_execution_time', 300); // Ubah 300 sesuai kebutuhan waktu yang diinginkan (dalam detik).

        $pdf = PDF::loadview('dashboard.ktpAdmin.cetak', [
            'title' => 'Cetak',
            'ktp' => $ktp,
        ])->setPaper('a4', 'potrait');
        return $pdf->stream('ktpBaru_' . '' . $ktp->id . '.pdf');
    }

    public function terima(ktpBaru $ktp)
    {
        $ktp->update(['status' => 'accepted']);

        ArsipKTP::create([
            'jenisKTP' => $ktp->jenisKTP,
            'nama' => $ktp->nama,
            'noKK' => $ktp->noKK,
            'nik' => $ktp->nik,
            'alamat' => $ktp->alamat,
            'RT' => $ktp->RT,
            'RW' => $ktp->RW,
            'kodePos' => $ktp->kodePos,
            'tglSurat' => $ktp->tglSurat,
            'Camat' => $ktp->Camat,
            'lurah' => $ktp->lurah,
        ]);

        $ktp->delete();

        return redirect('/dashboard/ktp')->with('success', 'Permohonan Telah Diterima!');
    }

}
