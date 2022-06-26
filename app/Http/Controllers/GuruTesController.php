<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Soal;
use App\Models\Soal_opsi;
use App\Models\Tes;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class GuruTesController extends Controller
{
    public function __construct(Request $r)
    {
        $this->kode_kelas = Kelas::where('kode', $r->segment(2))->firstOrFail();
    }

    public function create()
    {
        $kode_kelas = $this->kode_kelas->kode;
        $mode_view = 'create';
        return view('guru.tes.create', compact('kode_kelas', 'mode_view'));
    }

    public function store(Request $r)
    {
        $durasi_jam = 2;

        Tes::updateOrCreate([
            'kelas_id' => $this->kode_kelas->id,
            'nama' => $r->nama_tes,
            'durasi_jam' => $durasi_jam,
            'datetime_mulai' => $r->datetime_mulai,
            'datetime_akhir' => $r->datetime_akhir,
        ], [
            'kelas_id' => $this->kode_kelas->id,
            'nama' => $r->nama_tes,
            'durasi_jam' => $durasi_jam,
            'datetime_mulai' => $r->datetime_mulai,
            'datetime_akhir' => $r->datetime_akhir,
        ]);

        $tes = Tes::where('kelas_id', $this->kode_kelas->id)
            ->where('nama', $r->nama_tes)
            ->where('durasi_jam', $durasi_jam)
            ->where('datetime_mulai', $r->datetime_mulai)
            ->where('datetime_akhir', $r->datetime_akhir)
            ->first();
        
        $data_temp = [];
        $data = [];
        foreach (Arr::except($r->all(), ['_token', 'nama_tes', 'datetime_mulai', 'datetime_akhir']) as $s => $v) {
            $input = substr($s, 0, -2);
            array_push($data_temp, [
                'key' => $input,
                'value' => $v
            ]);
            if ($input == 'benar') {
                array_push($data, $data_temp);
                $data_temp = [];
            }
        }

        foreach ($data as $d) {
            $data_soal = [
                'tes_id' => $tes->id,
                'pertanyaan' => '__dot__'.$d[0]['value'],
            ];

            Soal::create($data_soal);
            $soal = Soal::where('tes_id', $tes->id)
                ->where('pertanyaan', '__dot__'.$d[0]['value'])
                ->first();
            
            $tanda_benar = 1;
            foreach ($d as $k) {
                if (substr($k['key'], 0, -2) == 'opsi') {
                    Soal_opsi::create([
                        'soal_id' => $soal->id,
                        'opsi' => '__dot__'.$k['value']
                    ]);

                    if ($tanda_benar == $d[6]['value']) {
                        $soal_opsi = Soal_opsi::where('soal_id', $soal->id)
                            ->where('opsi', '__dot__'.$k['value'])
                            ->first();

                        Soal::updateOrCreate($data_soal, [
                            'tes_id' => $tes->id,
                            'pertanyaan' => $d[0]['value'],
                            'opsi_benar_id' => $soal_opsi->id
                        ]);
                        $tanda_benar == 1;
                    } else {
                        $tanda_benar++;
                    }
                    Soal_opsi::updateOrCreate([
                        'soal_id' => $soal->id,
                        'opsi' => '__dot__'.$k['value']
                    ], [
                        'soal_id' => $soal->id,
                        'opsi' => $k['value']
                    ]);
                }
            }
        }

        return redirect('kelas/'.$this->kode_kelas->kode);
    }
}
