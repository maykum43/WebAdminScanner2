@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Customer</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ route('update_user',$data->id) }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" value="{{$data->name}}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="{{$data->email}}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Telepon</label>
                            <input type="number" name="phone" class="form-control" value="{{$data->phone}}">
                        </div>
                        <div class="form-group mb-3">
                            <label>No. Rekening</label>
                            <input type="number" name="norek" class="form-control" value="{{$data->norek}}">
                        </div>
                        <div class="form-group mb-3">
                            <label>BANK</label>
                            <input type="text" name="nama_bank" class="form-control" value="{{$data->nama_bank}}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Atas Nama</label>
                            <input type="text" name="atas_nama" class="form-control" value="{{$data->atas_nama}}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Username Akun Online Shop</label>
                            <input type="text" name="nama_akun_ol" class="form-control" value="{{$data->nama_akun_ol}}">
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
