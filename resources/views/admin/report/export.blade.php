<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Harian</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th rowspan="2" style="text-align:center;vertical-align:middle;">No.</th>
                <th rowspan="2" style="text-align:center;vertical-align:middle;">Wilayah</th>
                <th rowspan="2" style="text-align:center;vertical-align:middle;">Tanggal</th>
                <th colspan="2" style="text-align:center;vertical-align:middle;">Pelanggaran Peraturan Daerah</th>
                <th colspan="2" style="text-align:center;vertical-align:middle;">Jenis Sanksi</th>
                <th colspan="2" style="text-align:center;vertical-align:middle;">Besaran Denda</th>
            </tr>
            <tr>
                <th style="text-align:center;vertical-align:middle;">Jenis</th>
                <th style="text-align:center;vertical-align:middle;">Jumlah</th>
                <th style="text-align:center;vertical-align:middle;">Pidana</th>
                <th style="text-align:center;vertical-align:middle;">Administratif</th>
                <th style="text-align:center;vertical-align:middle;">Pidana</th>
                <th style="text-align:center;vertical-align:middle;">Administratif</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $report->kecamatan }}</td>
                    <td>{{ $report->tanggal_kegiatan }}</td>
                    <td>{{ implode(',', $report->jenis_pelanggaran) }}</td>
                    <td>{{ $report->jumlah_pelanggar }}</td>
                    <td>{{ $report->sanksi_pidana() }}</td>
                    <td>{{ implode(',', $report->sanksi_administratif) }}</td>
                    <td>{{ $report->denda_pidana }}</td>
                    <td>{{ $report->denda_administratif }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: center">Plt. Kepala Dinas Satpol PP dan Damkar</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: center">Fredy Lasut</td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
