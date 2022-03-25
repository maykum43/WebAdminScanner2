@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Serial Number</h3>
                <a href="{{ route('create_sn') }}" class="btn btn-primary btn-sm float-right">
                    Tambah Data
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
            @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
            <form method="GET" action="{{ route('sn')}}">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="cari_sn" placeholder="Masukan SN yang ingin dicari">
                            <div class="input-group-prepend">
                                <button class="btn btn-success" type="submit">Cari SN</button>
                            </div>
                            <!-- /btn-group -->

                        </div>
                    </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Serial Number </th>
                            <th>Nama Produk</th>
                            <th>Poin</th>
                            <th>Status</th>
                            <th style="width: 70px">Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach($sn as $data)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $data->sn}}</td>
                            <td>{{ $data->judul}}</td>
                            <td>{{ $data->harga}}</td>
                            <td>{{ $data->status}}</td>
                            <td>
                                <div class="btn-group">
                                <!-- <button type="button" class="btn btn-info btn-sm float-right" data-toggle="modal"
                                    data-target="#ModalDetailData">
                                    Detail
                                </button> -->
                                <a href="{{ route('edit_sn',$data->id_sn)}}"
                                    class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ route('delete_sn',$data->id_sn)}}"
                                    class="btn btn-warning btn-sm">Nonaktifkan</a>
                                <a href="{{ route('Hdelete_sn',$data->id_sn)}}"
                                    class="btn btn-danger btn-sm">Hapus</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        <!-- <tr>
                      <td>1.</td>
                      <td>Update software</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-danger">55%</span></td>
                    </tr> -->
                    </tbody>
                </table>
                <p>
                {{ $sn->links() }}
            </div>
            <!-- /.card-body -->
        </div>

    </div><!-- /.container-fluid -->

</section>
<!-- /.content -->
</div>
@endsection
