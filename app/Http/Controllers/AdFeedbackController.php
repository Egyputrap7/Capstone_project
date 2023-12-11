<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdFeedbackController extends Controller
{
    public function index()
    {
        return view('dashboard.feedbackAdmin.datafeedback', [
            'title' => 'feedbac Admin',
        ]);
    }
}
