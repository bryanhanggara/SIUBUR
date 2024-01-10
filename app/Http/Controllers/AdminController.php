<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index() {

        $user = User::count();
        $operator = User::where('jabatan_id', 3)->count();
        $buruhKasar = User::where('jabatan_id', 4)->count();
        return view('admin.index', compact(
            'user',
            'operator',
            'buruhKasar'
        ));
    }
}
