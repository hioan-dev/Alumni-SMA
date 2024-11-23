<?php

namespace App\Imports;

use App\Models\Alumni;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataAlumni implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $rows
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Cari user berdasarkan email
            $user = User::where('email', $row['email'])->first();

            // Periksa apakah user ada dan belum memiliki data alumni
            if ($user && !Alumni::where('user_id', $user->id)->exists()) {
                // Transformasi tanggal lahir ke format Y-m-d
                $tanggal_lahir = isset($row['tanggal_lahir']) ? $this->transformDate($row['tanggal_lahir']) : null;

                // Menyusun data pendidikan dalam array asosiatif
                $pendidikan_data = [
                    [
                        'jurusan' => $row['jurusan'],
                        'pendidikan' => $row['pendidikan'],
                        'universitas' => $row['universitas'],
                    ],
                ];
                // Mengubah data pendidikan menjadi format JSON
                $pendidikan = json_encode($pendidikan_data);

                Alumni::create([
                    'nama_lengkap' => $row['nama_lengkap'],
                    'tahun_lulus' => $row['tahun_lulus'],
                    'kelas' => $row['kelas'],
                    'tempat_lahir' => $row['tempat_lahir'],
                    'tanggal_lahir' => $tanggal_lahir,
                    'teman_sebangku' => $row['teman_sebangku'],
                    'alamat' => $row['alamat'],
                    'provinsi' => $row['provinsi'],
                    'kota' => $row['kota'],
                    'jenkel' => $row['jenkel'],
                    'ukuran_baju' => $row['ukuran_baju'],
                    'pendidikan' => $pendidikan,
                    'pekerjaan' => $row['pekerjaan'],
                    'perusahaan' => $row['perusahaan'],
                    'jabatan' => $row['jabatan'],
                    'no_hp' => $row['no_hp'],
                    'email' => $row['email'],
                    'user_id' => $user->id,
                    'approved' => false,
                ]);
            }
        }
    }

    /**
     * Mengubah format tanggal menjadi Y-m-d.
     *
     * @param mixed $value
     * @return string|null
     */
    private function transformDate($value)
    {
        // Jika nilai adalah instance DateTime
        if ($value instanceof \DateTime) {
            return $value->format('Y-m-d');
        }

        // Jika tanggal berupa angka serial Excel
        if (is_numeric($value)) {
            return Carbon::parse(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value))->format('Y-m-d');
        }

        // Proses tanggal jika dalam format string
        $formats = ['d/m/y', 'd-m-Y', 'Y-m-d', 'd/m/Y'];

        foreach ($formats as $format) {
            try {
                return Carbon::createFromFormat($format, $value)->format('Y-m-d');
            } catch (\Exception $e) {
                continue;
            }
        }

        // Jika format tidak cocok, kembalikan null
        return null;
    }
}
