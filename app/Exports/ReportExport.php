<?php

namespace App\Exports;

use App\Models\Report;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportExport implements FromView, ShouldAutoSize
{
    use Exportable;

    protected $date;
    private $row = 0;

    function __construct($date)
    {
        $this->date = $date;
    }

    public function model(array $row)
    {
        ++$this->row;
    }

    public function view(): View
    {
        return view('admin.report.export', [
            'reports' => Report::whereDate('tanggal_kegiatan', $this->date)
                ->get()
        ]);
    }
}
