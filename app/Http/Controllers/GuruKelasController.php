<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GuruKelasController extends Controller
{
    public function create()
    {
        $mode_view = 'create';
        return view('guru.create', compact('mode_view'));
    }

    public function store(Request $r)
    {
        $kode = Str::random(8);
        Kelas::create([
            'nama' => $r->nama_kelas,
            'kode' => $kode,
            'owner_id' => Auth::id(),
        ]);
        $user = User::find(Auth::id());
        $kelas = Kelas::where('nama', $r->nama_kelas)
            ->where('kode', $kode)
            ->where('owner_id', Auth::id())
            ->first();
        $user->kelas()->attach($kelas->id);
        return redirect('/');
    }
}
