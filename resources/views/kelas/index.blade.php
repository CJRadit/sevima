@extends('layouts.front')

@section('content')
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="m-0">{{ $kelas->nama }} <small>({{ $kelas->kode }})</small></h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                @foreach ($tes as $t)
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title m-0">{{ $t['nama'] }}</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">
                                @php
                                    if (isset($t['skor'])) {
                                        echo 'Skor: 100';
                                    } else {
                                        echo 'Belum dikerjakan.';
                                    }
                                @endphp
                            </h6>

                            <p class="card-text">Tanggal/waktu pengerjaan: {{ $t['datetime_mulai_formatted'] }} s.d. {{ $t['datetime_akhir_formatted'] }}</p>
                            @php
                                if (($t['datetime_mulai'] < date("Y-m-d H:i:sa") && $t['datetime_akhir'] > date("Y-m-d H:i:sa")) && isset($t['skor'])) {
                                    echo '<a href="tes'.$t['id'].'" class="btn btn-primary">Kerjakan tes</a>';
                                } else {
                                    echo '<a href="#" class="btn btn-primary disabled" onclick="event.preventDefault()">Kerjakan tes</a>';
                                }
                            @endphp
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection