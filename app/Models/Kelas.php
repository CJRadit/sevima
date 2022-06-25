<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'nama',
        'kode',
        'owner_id',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_kelas');
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
