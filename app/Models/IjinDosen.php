<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IjinDosen extends Model
{
    use HasFactory;

    public function getStatusDescriptionAttribute()
    {
        switch ($this->status) {
            case 1:
                return 'Open';
            case 2:
                return 'Proses';
            case 3:
                return 'Selesai';
            case 4:
                return 'Deskripsi Status 4';
            case 5:
                return 'Deskripsi Status 5';
            default:
                return 'Tidak Diketahui';
        }
    }
    public function getStatusColorClassAttribute()
    {
        switch ($this->status) {
            case 1:
                return 'btn-primary'; // Warna biru untuk status Open
            case 2:
                return 'btn-success'; // Warna hijau untuk status Proses
            case 3:
                return 'btn-warning'; // Warna kuning untuk status Selesai
            case 4:
                return 'btn-danger'; // Warna merah untuk status lainnya
            case 5:
                return 'btn-info'; // Warna biru muda untuk status lainnya
            default:
                return 'btn-secondary'; // Warna abu-abu untuk status lainnya
        }
    }

    public function pelaksana()
    {
        return $this->hasMany(AnggotaIjin::class);
    }
}
