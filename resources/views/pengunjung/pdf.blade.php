<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Pengunjung</title>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-size: 12px; color: #333; }
        .header { text-align: center; margin-bottom: 25px; }
        .header h2 { margin: 0; padding: 0; color: #1e293b; }
        .header p { margin: 5px 0 0 0; color: #64748b; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #e2e8f0; padding: 10px 8px; text-align: left; }
        th { background-color: #f8fafc; color: #1e293b; font-weight: bold; }
        .text-center { text-align: center; }
        .badge { padding: 4px 8px; border-radius: 4px; font-weight: bold; font-size: 10px; }
        .badge-selesai { background-color: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }
        .badge-hadir { background-color: #eff6ff; color: #2563eb; border: 1px solid #bfdbfe; }
        .badge-pending { background-color: #fffbeb; color: #d97706; border: 1px solid #fde68a; }
        .badge-dijadwalkan { background-color: #f1f5f9; color: #475569; border: 1px solid #cbd5e1; }
        .sub-text { font-size: 10px; color: #94a3b8; margin-top: 2px; }
    </style>
</head>
<body>

    <div class="header">
        <h2>LAPORAN DATA KUNJUNGAN</h2>
        <p>Dicetak pada tanggal: {{ date('d M Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th class="text-center" style="width: 5%">No</th>
                <th style="width: 25%">Waktu</th>
                <th style="width: 20%">Deteni</th>
                <th style="width: 20%">Pengunjung</th>
                <th style="width: 12%">Jenis Kunjungan</th>
                <th style="width: 10%">Durasi</th>
                <th class="text-center" style="width: 8%">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($visitors as $index => $item)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>
                    <strong>{{ \Carbon\Carbon::parse($item->tanggal_kunjungan)->format('H:i') }}</strong> - 
                    {{ \Carbon\Carbon::parse($item->tanggal_kunjungan)->addMinutes(30)->format('H:i d M Y') }}
                </td>
                <td>
                    <strong>{{ $item->detensi->nama }}</strong>
                    <div class="sub-text">({{ $item->detensi->negara }})</div>
                </td>
                <td>
                    <strong>{{ $item->nama }}</strong>
                    <div class="sub-text">(keluarga)</div>
                </td>
                <td>Tatap Muka</td>
                <td>30 Menit</td>
                <td class="text-center">
                    @switch(strtolower($item->status))
                        @case('selesai')
                            <span class="badge badge-selesai">Selesai</span>
                            @break
                        @case('hadir')
                            <span class="badge badge-hadir">Hadir</span>
                            @break
                        @case('pending')
                            <span class="badge badge-pending">Menunggu</span>
                            @break
                        @case('dijadwalkan')
                            <span class="badge badge-dijadwalkan">Dijadwalkan</span>
                            @break
                        @default
                            <span class="badge">{{ $item->status }}</span>
                    @endswitch
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>