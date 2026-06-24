<?php

namespace App\Models;

use App\Models\Pengunjung;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;



#[Fillable(['nama', 'negara', 'paspor', 'tanggal_masuk', 'status'])]
class Detensi extends Model
{
    use HasFactory;
    public function pengunjung(): HasMany
    {
        return $this->hasMany(Pengunjung::class, 'deteni_id');
    }

}