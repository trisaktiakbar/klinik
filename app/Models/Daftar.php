<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Nicolaslopezj\Searchable\SearchableTrait;

class Daftar extends Model
{
    use HasFactory;
    protected $guarded = [];

    use SearchableTrait;

    protected $searchable = [
        'columns' => [
            'daftars.keluhan' => 1,
            'pasiens.nama' => 1,
            'pasiens.no_pasien' => 1,
            'pasiens.jenis_kelamin' => 1,
            'polis.nama' => 1,
        ],
        'joins' => [
            'pasiens' => ['pasiens.id', 'daftars.pasien_id'],
            'polis' => ['polis.id', 'daftars.poli_id'],
        ],
    ];

    protected $with = ['pasien', 'poli'];


    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class)->withDefault();
    }

    public function poli(): BelongsTo
    {
        return $this->belongsTo(Poli::class)->withDefault();
    }
}
