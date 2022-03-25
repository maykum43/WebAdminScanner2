@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Data Serial Number</h3>
            </div>
            <div class="card-body">

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <form action="{{ route('simpan_sn')}}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label>SN</label>
                        <input type="text" name="sn" class="form-control @error('sn') is-invalid @enderror" id="sn"
                            value="{{ old('sn') }}" required autocomplete="sn" autofocus>
                    </div>
                    <div class="form-group mb-3">
                        <label>Judul</label>
                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                            id="judul" value="{{ old('judul') }}" required autocomplete="judul" autofocus>
                    </div>
                    <div class="form-group mb-3">
                        <label>Poin</label>
                        <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror"
                            id="harga" value="{{ old('harga') }}" required autocomplete="harga" autofocus>
                    </div>
                    <!-- select -->
                    <div class="form-group" name="status">
                        <label>Status</label>
                        <select class="form-control" id="opsi_status" name="status">
                            <option value="Aktif" id="Aktif">Aktif</option>
                            <option value="Nonaktif" id="Nonaktif">Nonktif</option>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <button type="submit" class="btn btn-primary btn-mb-4">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
