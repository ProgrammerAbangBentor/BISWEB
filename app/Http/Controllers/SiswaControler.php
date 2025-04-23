<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SiswaControler extends Controller
{
    public function show()
    {
        $user = Auth::user(); // Ambil user yang login
        $dataMaster = $user->dataMaster; // Ambil relasi ke DataMaster

        if (!$dataMaster) {
            return redirect()->back()->with('error', 'Data master tidak ditemukan.');
        }

        return view('pages.profile.show', compact('user','dataMaster'));
    }
}
