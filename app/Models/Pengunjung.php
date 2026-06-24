<?php

namespace App\Models;

use App\Models\Detensi;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; 


#[Fillable(['nama', 'nik', 'telepon', 'tanggal_kunjungan', 'status'])]
class Pengunjung extends Model
{
    use HasFactory;
    public function detensi(): BelongsTo
    {
        return $this->belongsTo(Detensi::class, 'deteni_id'); 
    }

}


