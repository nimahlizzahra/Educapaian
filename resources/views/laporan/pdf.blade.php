<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pencapaian</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        h2, h4 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>

    <h2>Laporan Pencapaian</h2>
    <h4>Bulan {{ $bulan }} Tahun {{ $tahun }}</h4>

    <h4>Data Capaian Guru</h4>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Guru</th>
                <th>Capaian</th>
                <th>Penyelenggara</th>  
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($capaians as $index => $capaian)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $capaian->guru->nama_guru ?? '-' }}</td>
                    <td>{{ $capaian->jenis_capaian }}</td>
                    <td>{{ $capaian->penyelenggara }}</td>
                    <td>{{ \Carbon\Carbon::parse($capaian->tanggal_capaian)->format('d-m-Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Tidak ada data capaian guru untuk bulan ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h4>Data Prestasi Siswa</h4>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Jenis Prestasi</th>
                <th>Penyelenggara</th>
                <th>Tanggal Raih</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($prestasis as $index => $prestasi)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $prestasi->siswa->nama_siswa ?? '-' }}</td>
                    <td>{{ $prestasi->jenis_prestasi }}</td>
                    <td>{{ $prestasi->penyelenggara }}</td>
                    <td>{{ \Carbon\Carbon::parse($prestasi->tanggal_raih_prestasi)->format('d-m-Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Tidak ada data prestasi siswa untuk bulan ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
