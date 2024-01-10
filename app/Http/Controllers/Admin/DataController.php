<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class DataController extends Controller
{
    public function index() {
        $buruhs = User::with([
           'jabatan' 
        ])->get();
        
        $user = User::count();
        
        return view('admin.data', compact(
            'buruhs','user'
        ));
    }

    public function operator()
    {
        
        $operators = User::with(['absens' => function ($query) {
            $query->whereMonth('created_at',  Carbon::today()->month)
                ->whereYear('created_at',  Carbon::today()->year);
        }])
        ->where('jabatan_id', 3) // Menambahkan kondisi where untuk jabatan_id
        ->get();
    
        return view('admin.operator', compact('operators'));
    }

    public function buruhKasar()
    {
        $operators = User::with(['absens' => function ($query) {
            $query->whereMonth('created_at',  Carbon::today()->month)
                ->whereYear('created_at',  Carbon::today()->year);
        }])
        ->where('jabatan_id', 4) // Menambahkan kondisi where untuk jabatan_id
        ->get();
    
        return view('admin.operator', compact('operators'));
    }

    public function edit($id) {
        $buruh = User::findorfail($id);
        $jabatan = Jabatan::all();
        return view('admin.edit', compact(
            'buruh',
            'jabatan'
        ));
    }

    public function update(Request $request, string $id)
    {
        $validated = Validator::make($request->all(), [
            'jabatan_id' => ['string','exists:jabatans,id'],   
            
        ]);

        if($validated->fails()) {
            return redirect()->route('home.user')->with(
                'danger',
                'Ups! Jabatannya di isi ya'
            );
        }

        $data = User::find($id);

        if (!$data) {
            return redirect()->route('home.user')->with(
                'danger',
                'Data tidak ditemukan'
            );
        }

        $data->jabatan_id = $request->input('jabatan_id');
    
        $data->save();

        return redirect()->route('home.user')->with(
            'success',
            'Data berhasil diperbarui'
        );

    }
}
