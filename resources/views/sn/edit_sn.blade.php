@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data SN Cashback</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ route('update_sn',$data->id_sn) }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label>SN</label>
                            <input type="text" name="sn" class="form-control" value="{{$data->sn}}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Judul</label>
                            <input type="text" name="judul" class="form-control" value="{{$data->judul}}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Harga</label>
                            <input type="number" name="harga" class="form-control" value="{{$data->harga}}">
                        </div>
                      <!-- select -->
                      <div class="form-group" name="status">
                        <label>Status</label>
                        <select class="form-control" id="opsi_status" name="status">
                            <option>{{$data->status}}</option>
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
    </div>
</div>
@endsection
