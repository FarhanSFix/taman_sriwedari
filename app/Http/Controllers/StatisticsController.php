<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documents;
use App\Models\KeuanganLain;

class StatisticsController extends Controller
{

    public function documentStats()
    {
        $documents = Documents::selectRaw('jenis, COUNT(*) as total')
            ->groupBy('jenis')
            ->get();

        return response()->json($documents);
    }

    // API untuk chart bulanan (menggabungkan kedua tabel)
    public function monthlyStats()
    {
        $monthly = Document::selectRaw("MONTH(bulan_pengesahan) as month, COUNT(*) as total")
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return response()->json($monthly);
    }
}
