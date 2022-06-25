@extends('layouts.front')

@section('content')
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="m-0">{{ $tes->nama }}</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="card card-outline card-primary col-12">
                <form action="{{ Request::url() }}" method="post">
                    <input type="hidden" name="_jawaban_id" value="{{ $jawaban_id }}">
                    @csrf
                    <div class="card-body">
                        @php
                            $nomor_soal = 1;
                        @endphp
                        @foreach ($soal as $s)
                            <div class="form-group">
                                <p>{{ $nomor_soal++ }}.) {{ $s['pertanyaan'] }}</p>
                                @foreach ($s['opsi'] as $so)
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="{{ $s['id'] }}" id="soal_opsi_id_{{ $so['id'] }}" value="{{ $so['id'] }}">
                                        <label class="form-check-label" for="opsi_id_{{ $so['id'] }}">{{ $so['soal_opsi'] }}</label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Kumpulkan Tes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection