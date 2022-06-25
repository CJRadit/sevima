<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Soal;
use App\Models\Soal_opsi;
use App\Models\Tes;
use Illuminate\Http\Request;

class TesController extends Controller
{
    public function __construct(Request $r)
    {
        Kelas::where('kode', $r->segment(2))->firstOrFail();
        Tes::findOrFail($r->segment(4));
        
        $this->kode_kelas = $r->segment(2);
        $this->id = $r->segment(4);
    }

    public function index()
    {
        $soal = [];

        foreach (Soal::where('tes_id', $this->id)->get() as $s) {
            $opsi = [];

            foreach (Soal_opsi::where('soal_id', $s->id)->get() as $so) {
                array_push($opsi, [
                    'soal_opsi_id' => $so->id,
                    'soal_opsi' => $so->opsi,
                ]);
            }

            array_push($soal, [
                'soal_id' => $s->id,
                'pertanyaan' => $s->pertanyaan,
                'opsi' => $opsi,
            ]);
        }

        $mode_view = 'tes';
        return view('tes/tes', compact('soal', 'mode_view'));
    }
}
