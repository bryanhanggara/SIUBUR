<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\User;
use App\Http\Requests\ReportRequest;

class ReportAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $reports = Report::all();
        return view('admin.report.index', compact(
            'reports'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('admin.report.create', compact(
            'users'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReportRequest $request)
    {
        $data = $request->all();
        Report::create($data);
        return redirect()->route('performance.index')->with(
            'success',
            'Laporan Berhasil Dikirim'
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $report = Report::findorfail($id);
        $report->delete();

        return redirect()->route('performance.index')->with(
            'danger',
            'Sudah dihapus'
        );
    }
}
