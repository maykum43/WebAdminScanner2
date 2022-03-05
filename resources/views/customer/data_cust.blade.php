@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Data Customer</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="GET" action="{{ route('customer')}}">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="cari_user" placeholder="Masukan Nama Customer">
                            <div class="input-group-prepend">
                                <button class="btn btn-success" type="submit">Cari User</button>
                            </div>
                            <!-- /btn-group -->

                        </div>
                    </form>

                    <!-- <a href="" class="btn btn-sm btn-primary float-end">Tambah Data</a> -->
                    <!-- <p> -->

                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                        aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">No.
                                </th>
                                <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">ID Customer</th> -->
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">
                                    Email</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">
                                    Nama</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">
                                    No.Telepon</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">
                                    No.Rekening</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">
                                    Bank</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">
                                    Atas Nama</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">
                                    ID Online Shop</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">
                                    Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp

                            @foreach ($cust as $data)
                            <tr class="odd">
                                <td>{{ $i++ }}</td>
                                <td>{{ $data->email}}</td>
                                <td>{{ $data->name}}</td>
                                <td>{{ $data->phone}}</td>
                                <td>{{ $data->norek}}</td>
                                <td>{{ $data->nama_bank}}</td>
                                <td>{{ $data->atas_nama}}</td>
                                <td>{{ $data->nama_akun_ol}}</td>
                                <td>{{ $data->status}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="" 
                                            class="btn btn-success btn-sm">Detail</a>
                                        <a href="{{ route('edit_user',$data->id)}}" 
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <a href="{{ route('delete_user',$data->id)}}" 
                                            class="btn btn-danger btn-sm">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
