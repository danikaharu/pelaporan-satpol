<?php

namespace App\Http\Controllers;

use App\Exports\ReportExport;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\Documentation;
use App\Models\Offender;
use App\Models\Report;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Image;

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
                ->addColumn('tanggal_kegiatan', function ($row) {
                    return $row->tanggal_kegiatan ? $row->tanggal_kegiatan : '-';
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

        try {
            DB::beginTransaction();

            // Create Report
            $report =  Report::create($attr);

            foreach ($attr['name'] as $key => $value) {
                $offender = new Offender();
                $offender->report_id = $report->id;
                $offender->name = $value;
                $offender->age = $request->age[$key];
                $offender->address = $request->address[$key];
                $offender->gender = $request->gender[$key];
                $offender->save();
            }

            if ($request->hasFile('file')) {
                $images = $request->file('file');

                foreach ($images as $image) {

                    if ($image->isValid()) {
                        $path = storage_path('app/public/uploads/');
                        $filename = $image->hashName();

                        Image::make($image->getRealPath())->resize(500, 500, function ($constraint) {
                            $constraint->upsize();
                            $constraint->aspectRatio();
                        })->save($path . $filename);

                        $attr['file'] = $filename;
                    }
                    // Create Documentation
                    Documentation::create([
                        'report_id' => $report->id,
                        'file' => $attr['file'],
                    ]);
                }
            }
            DB::commit();

            return back()->with('success', 'Terima kasih telah mengisi form');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('reports.index')
                ->with('error', $th->getMessage());
        }
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
            $documentation = Documentation::where('report_id', $report->id)->get();

            $path = storage_path('app/public/uploads/');

            if ($documentation) {
                foreach ($documentation as $item) {
                    if ($item->file && file_exists($path . $item->file)) {
                        unlink($path . $item->file);
                    }

                    $item->delete();
                }
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
