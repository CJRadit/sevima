@extends('layouts.front')

@section('content')
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="m-0">Buat Tes</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <div class="card card-primary card-outline">
                    <a href="#" class="btn btn-info" onclick="tambahSoal()"><i class="fa-solid fa-file-circle-plus mr-2"></i>Tambah soal</a>
                    {{-- <div class="card-header">
                        <h5 class="card-title m-0">{{ $t['nama'] }}</h5>
                    </div> --}}
                    <form action="/kelas/{{ $kode_kelas }}/tes" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_tes">Nama tes</label>
                                <input type="text" name="nama_tes" id="nama_tes">
                            </div>
                            <div class="form-group">
                                <label for="datetime_mulai">Tanggal mulai</label>
                                <input type="datetime-local" name="datetime_mulai" id="datetime_mulai">
                            </div>
                            <div class="form-group">
                                <label for="datetime_akhir">Tanggal akhir</label>
                                <input type="datetime-local" name="datetime_akhir" id="datetime_akhir">
                            </div>
                        </div>
                        <div class="card-body tambah-soal-di-sini">
                            
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Buat Tes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    var nomor_soal = 1;
    function tambahSoal() {
        $('.tambah-soal-di-sini').append(`
            <div>
                <div class="form-group">
                    <span id="nomor_${nomor_soal}">${nomor_soal}.)</span>
                    <input type="text" name="pertanyaan_${nomor_soal}" id="pertanyaan_${nomor_soal}" style="width: 90%">
                </div>
                <label>Opsi:</label>
                <div class="form-group">
                    <input type="text" name="opsi_1_${nomor_soal}" id="opsi_1_${nomor_soal}" style="width: 90%">
                    <input type="text" name="opsi_2_${nomor_soal}" id="opsi_2_${nomor_soal}" style="width: 90%">
                    <input type="text" name="opsi_3_${nomor_soal}" id="opsi_3_${nomor_soal}" style="width: 90%">
                    <input type="text" name="opsi_4_${nomor_soal}" id="opsi_4_${nomor_soal}" style="width: 90%">
                    <input type="text" name="opsi_5_${nomor_soal}" id="opsi_5_${nomor_soal}" style="width: 90%">
                </div>
                <label>Opsi benar:</label>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="benar_${nomor_soal}" id="benar_${nomor_soal}" value="1">
                        <label class="form-check-label" for="benar_${nomor_soal}">1</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="benar_${nomor_soal}" id="benar_${nomor_soal}" value="2">
                        <label class="form-check-label" for="benar_${nomor_soal}">2</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="benar_${nomor_soal}" id="benar_${nomor_soal}" value="3">
                        <label class="form-check-label" for="benar_${nomor_soal}">3</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="benar_${nomor_soal}" id="benar_${nomor_soal}" value="4">
                        <label class="form-check-label" for="benar_${nomor_soal}">4</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="benar_${nomor_soal}" id="benar_${nomor_soal}" value="5">
                        <label class="form-check-label" for="benar_${nomor_soal}">5</label>
                    </div>
                </div>
            </div>`
        );
        nomor_soal++;
    }
    $(document).ready(function() {
        tambahSoal();
    });
</script>
@endsection