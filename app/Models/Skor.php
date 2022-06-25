<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skor extends Model
{
    use HasFactory;

    protected $table = 'skor';

    protected $fillable = [
        'user_id',
        'tes_id',
        'jawaban_id',
        'skor'
    ];

    /**
     * Get the user that owns the Skor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Get the tes that owns the Skor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tes()
    {
        return $this->belongsTo(Tes::class);
    }

    /**
     * Get the jawaban that owns the Skor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jawaban()
    {
        return $this->belongsTo(Jawaban::class);
    }
}
