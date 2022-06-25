@extends('layouts.front')

@section('content')
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-12">
                <h1 class="m-0">Buat Kelas</h1>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <div class="card card-primary card-outline">
                    {{-- <div class="card-header">
                        <h5 class="card-title m-0">{{ $t['nama'] }}</h5>
                    </div> --}}
                    <form action="{{ url('kelas') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Kelas</label>
                                <input type="text" name="nama_kelas" id="#field-nama-kelas">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Buat Kelas</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection