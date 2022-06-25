<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function __construct(Request $r)
    {
        // Kelas::where('kode', $r->segment(2))->firstOrFail();
        $this->kode = $r->segment(2);
    }
    
    public function index()
    {
        Kelas::where('kode', $this->kode)->firstOrFail();

        return 'berhasil';
        // return $this->kode_kelas;
    }
}
