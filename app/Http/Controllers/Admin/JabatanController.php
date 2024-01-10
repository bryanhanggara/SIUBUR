<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jabatan;
use App\Http\Requests\JabatanRequest;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatans = Jabatan::all();
        return view('admin.jabatan.index', compact(
            'jabatans'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JabatanRequest $request)
    {
        $data =  $request->all();
        Jabatan::create($data);
        return redirect()->route('jabatan.index')->with(
            'success',
            'Posisi Berhasil Ditambah'
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jabatan = Jabatan::findorfail($id);
        return view('admin.jabatan.edit', compact(
            'jabatan'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JabatanRequest $request, string $id)
    {
        $data = $request->all();
        $jabatan = Jabatan::findorfail($id);
        $jabatan->update($data);

        return redirect()->route('jabatan.index')->with(
            'success',
            'Posisi Berhasil diubah'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jabatan = Jabatan::findorfail($id);
        $jabatan->delete();

        return redirect()->route('jabatan.index')->with(
            'danger',
            'Sudah dihapus'
        );
    }
}
