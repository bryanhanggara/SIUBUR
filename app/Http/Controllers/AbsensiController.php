<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Absensi;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AbsensiController extends Controller
{
    public function index()
    {
        $checkjabatan = Auth::user()->jabatan_id;
        
        if($checkjabatan == null) {
            Alert::error('Kamu Belum Ada Posisi', 'Silahkan hubungi admin SIUBUR untuk konfirmasi');
            return redirect()->back();
        }

        $currentTime = Carbon::now();
        $formattedDate = $currentTime->format('l, j F  Y');

        $user_id = Auth::id(); 
        $absensiHistory = Absensi::where('user_id', $user_id)
            ->orderBy('created_at', 'desc') 
            ->get();
    
       
        return view('user.absensi.index', compact('formattedDate','absensiHistory'));
    }

    public function absensiMasuk(Request $request)
{
    $user_id = $request->user_id;

    // Pastikan user_id valid
    $user = User::find($user_id);

    if (!$user) {
        Alert::question('Ada yang salah!', 'User tidak ditemukan');
        return redirect()->back();
    }

    // Cek apakah sudah absen masuk sebelumnya pada hari yang sama
    $existingAbsensi = Absensi::where('user_id', $user_id)
        ->whereDate('created_at', Carbon::today())
        ->first();

    if ($existingAbsensi) {
        Alert::error('Ups!', 'Kamu Sudah Absensi Masuk Hari Ini');
        return redirect()->back();
    }

    // Lakukan absensi masuk
    $absensi = new Absensi(); 
    $absensi->user_id = $user_id;
    $absensi->jam_masuk = now();
    $absensi->save();

    Alert::success('Berhasil Absensi', 'Semangat bekerja!');

    return redirect()->back();
}

public function absensiPulang(Request $request)
{
    $user_id = $request->user_id;

    // Pastikan user_id valid
    $user = User::find($user_id);

    if (!$user) {
        Alert::question('Ada yang salah!', 'User tidak ditemukan');
        return redirect()->back();
    }

    // // Cek apakah sudah absen pulang sebelumnya pada hari yang sama
    // $existingAbsensi = Absensi::where('user_id', $user_id)
    //     ->whereDate('created_at', Carbon::today())
    //     ->first();

    // if ($existingAbsensi) {
    //     Alert::error('Ups!', 'Kamu Sudah Absensi Pulang Hari Ini, Besok Lagi Ya!');
    //     return redirect()->back();
    // }

    // Lakukan absensi pulang
    $absensi = Absensi::where('user_id', $user_id)
        ->whereDate('created_at', Carbon::today())
        ->first();

    if (!$absensi) {
        Alert::error('Ups!, Kamu Belum Absen Masuk Hari Ini', 'Absen Masuk dulu ya');
        return redirect()->back();
    }

    $absensi->jam_pulang = now();
    $absensi->save();

    // Hitung selisih jam dan gaji
    $selisihJam = Carbon::parse($absensi->jam_masuk)->diffInHours(Carbon::parse($absensi->jam_pulang));
    $userJabatan = Jabatan::find($user->jabatan_id);
    $gaji = $selisihJam * $userJabatan->gaji;

    // Update selisih jam dan gaji ke dalam tabel absensi
    $absensi->selisih = $selisihJam;
    $absensi->gaji = $gaji;
    $absensi->save();

    Alert::success('Berhasil Absensi', 'Sampai Jumpa Besok Ya!');
    return redirect()->back();
}

}
