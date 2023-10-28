<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rumahsakit;
use App\Models\Pengaduan;
use App\Models\Petugas;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all()->count();

        $rumahsakit = Rumahsakit::all()->count();

        $pending = Pengaduan::where('status', '0')->get()->count();

        $proses = Pengaduan::where('status', 'proses')->get()->count();

        $selesai = Pengaduan::where('status', 'selesai')->get()->count();

        $totalLaporanPerTanggal = DB::table('pengaduan')
            ->select(DB::raw('DATE(tgl_pengaduan) as tanggal'), DB::raw('count(*) as total'))
            ->groupBy('tanggal')
            ->get();

        return view('admin.Dashboard.index', ['petugas' => $petugas, 'rumahsakit' => $rumahsakit, 'pending' => $pending, 'proses' => $proses, 'selesai' => $selesai, 'totalLaporanPerTanggal' => $totalLaporanPerTanggal]);
    }
}
