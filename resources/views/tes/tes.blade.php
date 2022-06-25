@extends('layouts.tes')

@php
    $nomor_soal = 1;
@endphp
@foreach ($soal as $s)
    @php
        $huruf_opsi = 'a';
    @endphp
    <p>{{ $nomor_soal++ }}. {{ $s['pertanyaan'] }}</p>
    @foreach ($s['opsi'] as $so)
        <p>{{ $huruf_opsi }}. {{ $so['soal_opsi'] }}</p>
        @php
            $huruf_opsi = chr(ord($huruf_opsi) + 1);
        @endphp
    @endforeach
@endforeach