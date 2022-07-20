<!DOCTYPE html>
<html>

@php
function tgl_indo($tanggal)
{
    $bulan = [
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember',
    ];
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}
@endphp

<head>
    <title>Laporan</title>
    <link rel="stylesheet" href="{{ public_path() . '/vendor/bootstrap/css/bootstrap.min.css' }}">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 8pt;
            white-space: nowrap;
        }
    </style>
    <center>
        <h5>Laporan Permintaan dan Stok Asam Sulfat</h5>
        <h6>Periode {{ tgl_indo($permintaan[0]->periode->nama_periode) }} s/d
            {{ tgl_indo($permintaan[count($permintaan) - 1]->periode->nama_periode) }}</h6>
    </center>

    <table class="table mt-4 table-bordered table-striped">
        <thead>
            <tr class="text-center bg-success text-white">
                <th width="3%" rowspan="2">No</th>
                <th rowspan="2">Periode</th>
                <th colspan="5" class="text-center">Jumlah</th>
            </tr>
            <tr class="text-center bg-success text-white">
                <th>Produksi</th>
                <th>Impor</th>
                <th>Permintaan</th>
                <th>Sisa</th>
                <th>Peramalan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permintaan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ tgl_indo($item->periode->nama_periode) }}</td>
                    <td>{{ number_format($item->jumlah_produksi, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->jumlah_impor, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->jumlah_permintaan, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->jumlah_sisa, 0, ',', '.') }}</td>
                    <td>{{ $item->peramalan->peramalan > 0 ? number_format($item->peramalan->peramalan, 0, ',', '.') : '' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
