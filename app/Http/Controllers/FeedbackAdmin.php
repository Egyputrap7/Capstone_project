<?php

namespace App\Http\Controllers;

use App\Models\feedback;
use Illuminate\Http\Request;

class FeedbackAdmin extends Controller
{
    public function index()
    { 
            return view('dashboard.feedbackAdmin.index', [
                'title' => 'feedback',
                'feedback' => feedback::latest()->paginate(8),
                'totalfeedback' => feedback::count()
            ]);
        
    }
    public function show(feedback $Feedback)
    {
        return view('dashboard.feedbackAdmin.show', [
            'title' => 'feedback',
            'active' => 'feedback',
            'Feedback' => $Feedback,
        ]);
    }
     /**
     * Remove the specified resource from storage.
     * @return \Illuminate\Http\Response
     */
    public function destroy(feedback $Feedback)
    {
        feedback::destroy($Feedback->id);

        return redirect('/dashboard/Feedback')->with('success', 'Surat berhasil dihapus!');
    }
}
