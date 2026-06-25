<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Data Pengunjung</title>

    <style>
        body{
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        .header{
            text-align:center;
            margin-bottom:20px;
        }

        .header h2{
            margin:0;
        }

        .header p{
            margin:3px 0;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table th,
        table td{
            border:1px solid #000;
            padding:8px;
        }

        table th{
            background:#f2f2f2;
            text-align:center;
        }

        .text-center{
            text-align:center;
        }

        .footer{
            margin-top:40px;
            text-align:right;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>RUMAH DETENSI IMIGRASI SURABAYA</h2>
        <p>Sistem Pencatatan Pengunjung</p>
        <p>Laporan Data Pengunjung</p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Nama Pengunjung</th>
                <th>NIK</th>
                <th>Telepon</th>
                <th>Nama Deteni</th>
                <th>Tanggal Kunjungan</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse($Pengunjungs as $index => $item)
                <tr>
                    <td class="text-center">
                        {{ $index + 1 }}
                    </td>

                    <td>
                        {{ $item->nama }}
                    </td>

                    <td>
                        {{ $item->nik }}
                    </td>

                    <td>
                        {{ $item->telepon }}
                    </td>

                    <td>
                        {{ $item->detensi->nama ?? '-' }}
                    </td>

                    <td>
                        {{ \Carbon\Carbon::parse($item->tanggal_kunjungan)->format('d M Y H:i') }}
                    </td>

                    <td>
                        {{ $item->status }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">
                        Tidak ada data pengunjung
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p>Surabaya, {{ now()->format('d F Y') }}</p>
        <br><br><br>
        <p><strong>Administrator Rudenim</strong></p>
    </div>

</body>
</html>