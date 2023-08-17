<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $subDistrictData = $this->getKecamatanData();
        $totalUser = User::count();
        $totalReport = Report::count();
        $totalByType = $this->getTotalByType();

        return view('admin.dashboard.index', compact('subDistrictData', 'totalUser', 'totalReport', 'totalByType'));
    }

    private function getKecamatanData()
    {
        $uniqueKecamatanValues = Report::distinct('kecamatan')->pluck('kecamatan');

        $laporanByKecamatan = Report::whereIn('kecamatan', $uniqueKecamatanValues)
            ->select('kecamatan', DB::raw('count(*) as total_laporan'))
            ->groupBy('kecamatan')
            ->get();

        return $laporanByKecamatan;
    }

    private function getTotalByType()
    {
        $totalByType = Report::whereIn('jenis_sanksi', ['Pidana', 'Administratif'])
            ->select('jenis_sanksi', DB::raw('count(jenis_sanksi) as total_laporan'))
            ->groupBy('jenis_sanksi')
            ->get();

        return $totalByType;
    }
}
