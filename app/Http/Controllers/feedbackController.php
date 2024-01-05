<?php

namespace App\Http\Controllers;

use App\Models\feedback;
use Illuminate\Http\Request;

class feedbackController extends Controller
{
    public function index()
    {
        return view('main.feedback', [
            'title' => 'feedback',
        ]);
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'pesan' => 'required'
        ]);

        // Simpan data feedback ke database
        Feedback::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect('/main/feedback')->with('success', 'Feedback berhasil disimpan! Terima kasih atas masukannya.');
    }

}
