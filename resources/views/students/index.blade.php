<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Akademik Praktikum ORM</title>
    <style>
        body { font: 16px Arial, sans-serif; margin: 32px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 12px; }
        th { background: #173b63; color: white; text-align: left; }
        td { vertical-align: top; }
        ul { padding-left: 18px; margin: 0; }
    </style>
</head>
<body>
    <h1>Data Mahasiswa dan Relasi</h1>
    <p>Praktikum Pemodelan Relasi Eloquent ORM</p>
    <table>
        <thead>
            <tr><th>NIM</th><th>Nama</th><th>Prodi</th>
                <th>Telepon</th><th>Kelas</th></tr>
        </thead>
        <tbody>
        @forelse ($students as $student)
            <tr>
                <td>{{ $student->nim }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->studyProgram->name }}</td>
                <td>{{ $student->profile?->phone ?? 'Belum diisi' }}</td>
                <td><ul>
                    @forelse ($student->courses as $course)
                        <li>{{ $course->name }}</li>
                    @empty
                        <li>Belum mengambil kelas</li>
                    @endforelse
                </ul></td>
            </tr>
        @empty
            <tr><td colspan="5">Belum ada mahasiswa</td></tr>
        @endforelse
        </tbody>
    </table>
</body>
</html>