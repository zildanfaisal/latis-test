<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'nis',
        'nama',
        'email',
        'foto',
        'lembaga_id',
    ];

    public function lembaga()
    {
        return $this->belongsTo(Lembaga::class);
    }
}
