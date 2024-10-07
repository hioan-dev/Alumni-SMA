<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Alumni</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h2>Data Alumni</h2>

    <table>
        <thead>
            <tr>
                <th>Nama Lengkap</th>
                <th>Tahun Lulus</th>
                <th>Kelas</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Teman Sebangku</th>
                <th>Alamat</th>
                <th>Provinsi</th>
                <th>Kota</th>
                <th>Jenis Kelamin</th>
                <th>Ukuran Baju</th>
                <th>Jurusan</th>
                <th>Pendidikan</th>
                <th>Universitas</th>
                <th>Pekerjaan</th>
                <th>Perusahaan</th>
                <th>Jabatan</th>
                <th>No HP</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->nama_lengkap }}</td>
                    <td>{{ $item->tahun_lulus }}</td>
                    <td>{{ $item->kelas }}</td>
                    <td>{{ $item->tempat_lahir }}</td>
                    <td>{{ $item->tanggal_lahir }}</td>
                    <td>{{ $item->teman_sebangku }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->provinsi }}</td>
                    <td>{{ $item->kota }}</td>
                    <td>{{ $item->jenkel }}</td>
                    <td>{{ $item->ukuran_baju }}</td>
                    <td>{{ $item->jurusan }}</td>
                    <td>{{ $item->pendidikan }}</td>
                    <td>{{ $item->pekerjaan }}</td>
                    <td>{{ $item->perusahaan }}</td>
                    <td>{{ $item->jabatan }}</td>
                    <td>{{ $item->no_hp }}</td>
                    <td>{{ $item->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
