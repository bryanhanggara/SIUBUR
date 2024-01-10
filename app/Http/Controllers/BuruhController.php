<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Absensi;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Auth;

class BuruhController extends Controller
{
    public function index() {
        $user_id = Auth::id();

        $checkjabatan = Auth::user()->jabatan_id;

        $absensiHariIni = Absensi::where('user_id', $user_id)
        ->whereDate('created_at', Carbon::today())
        ->first();

        $selisihJam = $absensiHariIni ? $absensiHariIni->selisih : 0;
        $gaji = $absensiHariIni ? $absensiHariIni->gaji : "-";
        $currentTime = Carbon::now();
        $formattedDate = $currentTime->format('l, j F  Y');
    
        return view('user.index', compact('formattedDate', 'selisihJam','gaji', 'checkjabatan'));
    }
}
