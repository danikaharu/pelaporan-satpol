<?php

namespace App\Exports;

use App\Models\Report;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;

class ReportExport implements FromView, ShouldAutoSize, WithStyles
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
            'reports' => Report::with('documentation')->whereDate('tanggal_kegiatan', $this->date)
                ->get()
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        // Get the last row index of the data
        $lastRow = $sheet->getHighestRow();

        // Apply styles to header row
        $sheet->getStyle('A1:N2')->applyFromArray([
            'font' => ['bold' => true],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);

        // Apply styles to data rows
        $sheet->getStyle("A3:N4")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);
    }
}
