<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Absensi;
use App\Models\Jabatan;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;


class ReportController extends Controller
{
    public function index()
    {
        $currentTime = Carbon::now();
        $formattedDate = $currentTime->format('l, j F  Y');

        $user_id = Auth::id(); 
        $absensiHistory = Absensi::where('user_id', $user_id)
            ->orderBy('created_at', 'desc') 
            ->get();

        $absensiHariIni = Absensi::where('user_id', $user_id)
            ->whereDate('created_at', Carbon::today())
            ->first();

        $selisihJam = $absensiHariIni ? $absensiHariIni->selisih : 0;
        $gaji = $absensiHariIni ? $absensiHariIni->gaji : "-";
        
        $absensiBulanIni = Absensi::where('user_id', $user_id)
            ->whereMonth('created_at', Carbon::today()->month)
            ->whereYear('created_at', Carbon::today()->year)
            ->get();

        $totalSelisihJam = $absensiBulanIni->sum('selisih');
        $totalGaji = $absensiBulanIni->sum('gaji');

        
        $reports = Report::where('user_id', $user_id)->get();
    
        return view('user.report.index', compact(
            'absensiHistory',
            'formattedDate',
            'selisihJam',
            'gaji',
            'reports',
            'totalSelisihJam',
            'totalGaji'
        ));
    }

    public function download($id) {
        $report = Report::find($id);

        if(!$report) {
            return abort(404);
        }

        $user = $report->user;
        $jabatan = $user->jabatan;
        $user_id = Auth::id();

        $tanggalBulanSebelumnya = Carbon::now()->subMonth();

        $absensiBulanSebelumnya = Absensi::where('user_id', $user_id)
            ->whereMonth('created_at', $tanggalBulanSebelumnya->month)
            ->whereYear('created_at', $tanggalBulanSebelumnya->year)
            ->get();

      
        $totalSelisihJamBulanSebelumnya = $absensiBulanSebelumnya->sum('selisih');
        $totalGajiBulanSebelumnya = $absensiBulanSebelumnya->sum('gaji');


        $absensiBulanIni = Absensi::where('user_id', $user_id)
        ->whereMonth('created_at', Carbon::today()->month)
        ->whereYear('created_at', Carbon::today()->year)
        ->get();

        $totalSelisihJam = $absensiBulanIni->sum('selisih');
        $totalGaji = $absensiBulanIni->sum('gaji');

        $pdf = PDF::loadView('user.report.pdf', compact('report', 'jabatan', 'totalSelisihJam', 'totalGaji','totalSelisihJamBulanSebelumnya','totalGajiBulanSebelumnya'));

        return $pdf->download('laporan_'.$report->user->name.'.pdf');
    }
}
