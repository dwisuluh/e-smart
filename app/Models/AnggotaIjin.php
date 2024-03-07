<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AnggotaIjin extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function ijinDosen()
    {
        return $this->belongsTo(IjinDosen::class);
    }

    public function Dosen()
    {
        return $this->belongsTO(Dosen::class);
    }

    public function getStatusDescriptionAttribute()
    {
        switch ($this->status) {
            case 1:
                return 'Belum Membuat Laporan';
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
}
