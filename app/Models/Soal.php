<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $table = 'soal';

    protected $fillable = [
        'tes_id',
        'pertanyaan',
        // 'opsi_benar_id'
    ];

    protected $hidden = [
        'opsi_benar_id',
    ];

    /**
     * Get the Tes that owns the Soal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tes()
    {
        return $this->belongsTo(Tes::class);
    }

    /**
     * Get the opsi_benar associated with the Soal
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function opsi_benar()
    {
        return $this->hasOne(Soal_opsi::class);
    }
}
