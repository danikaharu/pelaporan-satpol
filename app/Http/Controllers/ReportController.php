<?php

namespace App\Http\Controllers;

use App\Exports\ReportExport;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\Report;
use Yajra\DataTables\Facades\DataTables;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $reports = Report::with('user')->latest();

            if (auth()->user()->roles->first()->id != 1) {
                $reports->where('user_id', auth()->user()->id);
            }

            return Datatables::of($reports)
                ->addIndexColumn()
                ->addColumn('user', function ($row) {
                    return $row->user ? $row->user->name : '-';
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at ? $row->created_at->isoFormat('D MMMM Y') : '-';
                })
                ->addColumn('action', 'admin.report.include.action')
                ->toJson();
        }

        return view('admin.report.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.report.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReportRequest $request)
    {
        $attr = $request->validated();


        if ($request->file('foto_dokumentasi') && $request->file('foto_dokumentasi')->isValid()) {

            $filename = $request->file('foto_dokumentasi')->hashName();
            $request->file('foto_dokumentasi')->storeAs('uploads', $filename, 'public');

            $attr['foto_dokumentasi'] = $filename;
        }

        Report::create($attr);

        return back()->with('success', 'Terima kasih telah mengisi form');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        $report->load('user:id,name');

        return view('admin.report.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        try {
            $path = storage_path('app/public/uploads/');

            if ($report->foto_dokumentasi && file_exists($path . $report->foto_dokumentasi)) {
                unlink($path . $report->foto_dokumentasi);
            }

            $report->delete();

            return redirect()->route('reports.index')
                ->with('success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('reports.index')
                ->with('error', $th->getMessage());
        }
    }

    public function export()
    {
        $date = request()->date;

        if ($date) {
            return (new ReportExport($date))->download('laporan harian.xlsx');
        } else {
            return redirect()->back()->with('error', 'Maaf, tidak bisa export data');
        }
    }
}
