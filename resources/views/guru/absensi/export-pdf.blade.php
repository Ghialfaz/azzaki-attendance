<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rekap {{ $kelas->nama_kelas }} {{ $tanggal }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 6px;
        }

        th {
            background: #f3f3f3;
        }
    </style>
</head>

<body>
    <h2>Rekap Absensi - {{ $kelas->nama_kelas }}</h2>
    <p>Tanggal: {{ $tanggal }}</p>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>

        <tbody>
            @foreach($absensi as $a)
                <tr>
                    <td>{{ $a->siswa->nama }}</td>
                    <td>{{ $a->status }}</td>
                    <td>{{ $a->keterangan ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>