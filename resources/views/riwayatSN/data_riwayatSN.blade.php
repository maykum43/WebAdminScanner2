@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Data Riwayat SN</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="GET" action="{{ route('rwtsn')}}">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="cari" placeholder="Masukan User yang ingin dicari">
                            <div class="input-group-prepend">
                                <button class="btn btn-success" type="submit">Cari SN</button>
                            </div>
                            <!-- /btn-group -->

                        </div>
                    </form>

                    <a href="{{ route('create_riw')}}" class="btn btn-sm btn-primary float-end">Tambah Data</a>
                    <p>

                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                        aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                    colspan="1" aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">No.
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">
                                    SN</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">
                                    User</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">
                                    Status</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Created at</th>
                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">
                                    Reward</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp

                            @foreach ($riw as $data)
                            <tr class="odd">
                                <td>{{ $i++ }}</td>
                                <td>{{ $data['sn']}}</td>
                                <td>{{ $data['id']}}</td>
                                <td>{{ $data['status']}}</td>
                                <td>{{ $data['created_at']}}</td>
                                <td>{{ $data['judul']}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('update_status',$data->id_rwsn)}}" 
                                            class="btn btn-success btn-sm">Selesai</a>
                                        <a href="{{ route('edit_riw',$data->id_rwsn)}}" 
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <!-- <a href="{{ route('delete_riw',$data->id_rwsn)}}" 
                                            class="btn btn-danger btn-sm">Hapus</a> -->
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
