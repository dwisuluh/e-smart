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
}
