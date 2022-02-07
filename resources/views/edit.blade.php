@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Data') }}</div>
                    <div class="card-body">
                        <div class="row-1">
                        <a href="/home" class="btn btn-success">< Kembali</a>
                        </div>
                        <form class="text-start" method="POST" action="/home/{{ $datas->id }}">
                        @method('put')
                        @csrf
                        <br>
                        <input type="hidden" name="id" id="id" value="{{ old('id', $datas->id) }}">
                            <div class="mb-3">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan nama" required value="{{ old('nama', $datas->nama) }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                                <div class="col-sm-10">
                                <input type="number" name="nim" class="form-control @error('nim') is-invalid @enderror" id="nim" placeholder="Masukkan nama" required value="{{ old('nim', $datas->nim) }}">
                                @error('nim')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" placeholder="Masukkan nama" required value="{{ old('tanggal_lahir', $datas->tanggal_lahir) }}">
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection