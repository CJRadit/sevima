<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());
        $kelas = $user->kelas()->get();
        foreach ($kelas as $k) {
            $k['nama_owner'] = User::find($k->owner_id)->name;
        }

        $mode_view = 'dashboard';
        return view('index', compact('kelas', 'mode_view'));
    }
}
