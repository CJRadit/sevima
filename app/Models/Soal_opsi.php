<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal_opsi extends Model
{
    use HasFactory;

    protected $table = 'soal_opsi';

    protected $fillable = [
        'soal_id',
        'opsi'
    ];

    /**
     * Get the soal that owns the Soal_opsi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function soal()
    {
        return $this->belongsTo(Soal::class);
    }
}
