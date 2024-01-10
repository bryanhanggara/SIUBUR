<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index($username)
    {
        // Cari user berdasarkan nama pengguna (username)
        $user = User::where('name', $username)->first();

        return view('user.profile' , compact(
            'user'
        ));
    }

    public function updateProfile(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => ['string','min:3', 'max:191'],   
            
        ]);

        if($validated->fails()) {
            return redirect()->route('home.user')->with(
                'danger',
                'Ups! nama kamu isi ya'
            );
        }

        if(auth()->user()->image_profile == null) {
            $validated_image = Validator::make($request->all(),[
                'image_profile' => ['image','max:1000'],
            ]);

            if($validated_image->fails()) {
                return redirect()->route('home.user')->with(
                    'error',
                    'Ups, Ukuran Gambar Maks 1MB'
                );
            }
        }

        if($request->hasFile('image_profile')) {
            $imagePath = 'storage/'. auth()->user()->image_profile;
            if(File::exists($imagePath)) {
                File::delete($imagePath);
            }

            $profile = $request->image_profile->store('profile_image','public');
        }

        auth()->user()->update([
            'name' =>$request->name,
            'alamat' => $request->alamat,
            'tanggal_lhr' => $request->tanggal_lhr,
            'ttl' => $request->ttl,
            'jk' => $request->jk,
            'image_profile' => $profile ?? auth()->user()->image_profile
        ]);

        return redirect()->route('home.user')->with(
            'success',
            'Yeay, Profile mu berhasil diubah'
        );
    }


    public function jabatan(Request $request)
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

        auth()->user()->update([
            'jabatan_id' => $request->jabatan_id
        ]);

        return redirect()->route('home.user')->with(
            'success',
            'Yeay, Profile mu berhasil diubah'
        );
    }
}
