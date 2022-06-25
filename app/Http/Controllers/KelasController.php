<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Tes;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function __construct(Request $r)
    {
        $this->kelas = Kelas::where('kode', $r->segment(2))->firstOrFail();
    }
    
    public function index()
    {
        $kelas = $this->kelas;

        $tes = [];

        foreach (Tes::where('kelas_id', $kelas->id)->get() as $t) {
            $t['datetime_mulai_formatted'] = Carbon::create($t['datetime_mulai'])->toDayDateTimeString();
            $t['datetime_akhir_formatted'] = Carbon::create($t['datetime_akhir'])->toDayDateTimeString();
            array_push($tes, $t);
        }
        
        $mode_view = 'kelas';
        return view('kelas/index', compact('kelas', 'tes', 'mode_view'));
    }
}
