<?php

namespace App\Imports;

use App\Models\Dosen;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DosenImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Validasi jika data sudah ada di database
        // $validator = Validator::make($row, [
        //     'nama_kolom' => 'required', // Sesuaikan dengan aturan validasi Anda
        //     // Tambahkan aturan validasi untuk kolom lain jika diperlukan
        // ]);
        $existingDosen = Dosen::where('nip', $row['nip'])->exists();
        // if ($validator->fails()) {
        //     $errors = $validator->errors()->all();
        //     $errorMessage = implode(', ', $errors);
        //     throw new \Exception("Validasi data gagal: $errorMessage");
        // }
        if ($existingDosen) {
            return null;
        }
        // if (Dosen::where('nama_kolom', $row['nama_kolom'])->exists()) {
        //     // Data sudah ada, lewati
        //     return null;
        // }

        return new Dosen([
            'name'    => $row['name'],
            'nip'    => $row['nip'],
            'nidn'  => $row['nidn'],
            // 'email' => $row['email'],
            'noTelp' => $row['no_telp']
        ]);
    }
}
