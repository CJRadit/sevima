<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban_detail extends Model
{
    use HasFactory;

    protected $table = 'jawaban_detail';

    protected $fillable = [
        'jawaban_id',
        'soal_id',
        'soal_opsi_id',
    ];

    /**
     * Get the jawaban that owns the Jawaban
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jawaban()
    {
        return $this->belongsTo(Jawaban::class);
    }
    
    /**
     * Get the soal that owns the Jawaban
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function soal()
    {
        return $this->belongsTo(Soal::class);
    }

    /**
     * Get the soal_opsi that owns the Jawaban
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function soal_opsi()
    {
        return $this->belongsTo(Soal_opsi::class);
    }
}
