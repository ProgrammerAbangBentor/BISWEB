<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanExport;
use PDF;
use App\Http\Requests\LaporanRequest;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::latest()->paginate(10);
        return view('pages.laporan.index', compact('laporans'));
    }
}
