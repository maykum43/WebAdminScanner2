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

                <form action="{{ route('simpan_sn')}}" method="POST" name="inputDataSn">
                    @csrf

                    <div class="form-group mb-3">
                        <label>SN</label>
                        <input type="text" name="sn" class="form-control @error('sn') is-invalid @enderror" id="sn"
                            value="{{ old('sn') }}" required autocomplete="sn" autofocus>
                    </div>
                    <div class="form-group mb-3">
                        <label>Model</label>
                        <input type="text" name="model" class="form-control @error('model') is-invalid @enderror"
                            id="model" value="{{ old('model') }}" required autocomplete="model" autofocus>
                    </div>
                    <div class="form-group mb-3">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror"
                            id="harga" value="{{ old('harga') }}" required autocomplete="harga" onkeyup="hitPoin()" autofocus>
                    </div>
                    <div class="form-group mb-3">
                        <label>Discount</label>
                        <input type="number" name="discount" class="form-control @error('discount') is-invalid @enderror"
                            id="discount" value="{{ old('discount') }}" required autocomplete="discount" onkeyup="hitPoin()" autofocus>
                    </div>
                    <div class="form-group mb-3">
                        <label>Poin</label>
                        <input type="number" name="poin" class="form-control @error('poin') is-invalid @enderror"
                            id="poin" value="{{ old('poin') }}" required autocomplete="poin" onkeyup="hitPoin()" autofocus>
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

<script>

    function hitPoin(){
    var harga = document.getElementById('harga').value;
    var disc = document.getElementById('discount').value;

    // var result = (parseInt(harga)/parseInt(disc))/parseInt(penentu);
    var hargaDisc = (disc/100)*harga;

    var result = (harga/disc)/120;
    // var result = (harga-hargaDisc)/120;
    
        if(!isNaN(result)){
            document.getElementById('poin').value=result;
        }
    }    
    </script>
@endsection
