<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DataMaster;
use App\Models\Laporan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAdmin = User::all()->count();
        $totalNews = DataMaster::count();
        $totalReports = Laporan::count();

        // Statistik per tahun DataMaster
        $dataPerYear = DataMaster::selectRaw('YEAR(created_at) as year, COUNT(*) as total')
            ->groupBy('year')
            ->orderBy('year', 'asc')
            ->pluck('total', 'year')
            ->toArray();

        // Statistik per tahun Laporan
        $laporanPerYear = Laporan::selectRaw('YEAR(created_at) as year, COUNT(*) as total')
            ->groupBy('year')
            ->orderBy('year', 'asc')
            ->pluck('total', 'year')
            ->toArray();

        return view('pages.dashboard', compact('totalAdmin', 'totalNews', 'totalReports', 'dataPerYear', 'laporanPerYear'));
    }
}
