@extends('layouts.front')

@section('content')
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="m-0">Kelas</small></h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="row">
            @foreach ($kelas as $k)
                <div class="col-sm-6">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title m-0">{{ $k['nama'] }} <small>({{ $k['kode'] }})</small></h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Pengajar: {{ $k['nama_owner'] }}</p>
                            <a href="kelas/{{ $k['kode'] }}" class="btn btn-primary">Masuk</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection