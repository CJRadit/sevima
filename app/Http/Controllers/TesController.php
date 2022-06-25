<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use App\Models\Jawaban_detail;
use App\Models\Kelas;
use App\Models\Skor;
use App\Models\Soal;
use App\Models\Soal_opsi;
use App\Models\Tes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class TesController extends Controller
{
    public function __construct(Request $r)
    {
        Kelas::where('kode', $r->segment(2))->firstOrFail();
        
        $this->tes = Tes::findOrFail($r->segment(4));
        $this->kode_kelas = $r->segment(2);
    }

    public function index()
    {
        if (TesController::cek_status() == false) {
            return redirect('kelas/'.$this->kode_kelas);
        }

        $tes = $this->tes;

        $soal = [];

        foreach (Soal::where('tes_id', $this->tes->id)->get() as $s) {
            $opsi = [];

            foreach (Soal_opsi::where('soal_id', $s->id)->get() as $so) {
                array_push($opsi, [
                    'id' => $so->id,
                    'soal_opsi' => $so->opsi,
                ]);
            }

            array_push($soal, [
                'id' => $s->id,
                'pertanyaan' => $s->pertanyaan,
                'opsi' => $opsi,
            ]);
        }

        $jawaban_datetime = [
            'mulai' => Carbon::now(),
            'akhir' => Carbon::now()->addHours($tes->durasi_jam),
        ];
        // dd($tes);

        Jawaban::create([
            'user_id' => Auth::id(),
            'tes_id' => $this->tes->id,
            'datetime_mulai' => $jawaban_datetime['mulai'],
            'datetime_akhir' => $jawaban_datetime['akhir'],
            'durasi_jam' => $this->tes->durasi_jam,
        ]);

        $jawaban_id = Jawaban::where('user_id', Auth::id())
            ->where('tes_id', $tes->id)
            ->first()
            ->id;

        $mode_view = 'tes';
        return view('tes/tes', compact('tes', 'soal', 'jawaban_id', 'mode_view'));
    }

    public function store(Request $r)
    {
        $skor = 0;

        foreach (Arr::except($r->all(), ['_token', '_jawaban_id']) as $soal_id => $soal_opsi_id) {
            $cek_soal = Soal::where('tes_id', $this->tes->id)
                ->where('id', $soal_id)->first()->opsi_benar_id;
            if ($soal_opsi_id == $cek_soal) {
                $skor++;
            }
            
            Jawaban_detail::create([
                'jawaban_id' => $r->_jawaban_id,
                'soal_id' => $soal_id, 
                'soal_opsi_id' => (int) $soal_opsi_id
            ]);
        };

        $skor_kalkulasi = round($skor / Soal::where('tes_id', $this->tes->id)->count() * 100, 0);

        Skor::create([
           'user_id' => Auth::id(),
           'tes_id' => $this->tes->id,
           'jawaban_id' => $r->_jawaban_id,
           'skor' => $skor_kalkulasi,
        ]);

        return redirect('kelas/'.$r->segment(2));
    }

    function cek_status() {
        $query_jawaban = Jawaban::where('user_id', Auth::id())
            ->where('tes_id', $this->tes->id)
            ->first();
        if ($query_jawaban) {
            // dd($query_jawaban);
            if ($query_jawaban->datetime_akhir < Carbon::now()) {
                return false;
            }
        }

        $query_skor = Skor::where('user_id', Auth::id())
            ->where('tes_id', $this->tes->id)
            ->first();
        if ($query_skor) {
            return false;
        }

        return true;
    }
}
