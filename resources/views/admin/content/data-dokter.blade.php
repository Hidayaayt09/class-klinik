@extends('admin.master')
@section('data-master','active submenu')
@section('collapse','show')
@section('data-dokter','active')
@section('admin.content')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Data Dokter</h4>
                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambah-dokter">
                            <i class="fa fa-plus"></i>
                            Tambah
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Modal -->
                    <div class="modal fade" id="tambah-dokter" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('admin.dokter.create') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                            Tambah</span>
                                            <span class="fw-light">
                                                Dokter
                                            </span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group form-group-default">
                                                    <label>Nama</label>
                                                    <input type="text" name="nama" class="form-control" placeholder="Nama Dokter..">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-group-default">
                                                    <label>No HP</label>
                                                    <input type="text" name="no_hp" class="form-control" placeholder="No HP..">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-check">
                                                    <label>Jenis Kelamin</label><br/>
                                                    <label class="form-radio-label">
                                                        <input class="form-radio-input" type="radio" name="jenis_kelamin" value="Laki-Laki" checked>
                                                        <span class="form-radio-sign">Laki-Laki</span>
                                                    </label>
                                                    <label class="form-radio-label ml-3">
                                                        <input class="form-radio-input" type="radio" name="jenis_kelamin" value="Perempuan">
                                                        <span class="form-radio-sign">Perempuan</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group form-group-default">
                                                    <label>Foto</label>
                                                    <input type="file" name="foto" class="form-control-file">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group form-group-default">
                                                    <label>Alamat</label>
                                                    <textarea name="alamat" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer no-bd">
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="add-row display table table-striped table-hover text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No HP</th>
                                    <th>Alamat</th>
                                    <th>Foto</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ($data_dokter as $dokter)
                                <?php $no++; ?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $dokter->nama }}</td>
                                    <td>{{ $dokter->jenis_kelamin }}</td>
                                    <td>{{ $dokter->no_hp }}</td>
                                    <td>{{ $dokter->alamat }}</td>
                                    <td>
                                        <a href="{{ url('admin/img/dokter/'.$dokter->foto) }}"><img src="{{ url('admin/img/admin/'.$admin->foto) }}" width="100px"></a>
                                    </td>
                                    <td>
                                        <div class="form-button-action">
                                            <button type="button" data-toggle="modal" data-target="#edit-dokter{{ $dokter->dokter_id }}" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Dokter">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" dokter-id="{{ $dokter->dokter_id }}" class="hapus-dokter btn btn-link btn-danger" data-original-title="Hapus Dokter">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="edit-dokter{{ $dokter->dokter_id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('admin.dokter.update', $dokter->dokter_id) }}" enctype="multipart/form-data" method="POST">
                                                @csrf
                                                <div class="modal-header no-bd">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold">
                                                        Edit</span>
                                                        <span class="fw-light">
                                                            Dokter
                                                        </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-group-default">
                                                                <label>Nama</label>
                                                                <input type="text" name="nama" class="form-control" value="{{ $dokter->nama }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-group-default">
                                                                <label>No HP</label>
                                                                <input type="text" name="no_hp" class="form-control" value="{{ $dokter->no_hp }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-check">
                                                                <label>Jenis Kelamin</label><br/>
                                                                <label class="form-radio-label">
                                                                    <input class="form-radio-input" type="radio" name="jenis_kelamin" value="Laki-Laki" @if ($dokter->jenis_kelamin=="Laki-Laki") checked @endif>
                                                                    <span class="form-radio-sign">Laki-Laki</span>
                                                                </label>
                                                                <label class="form-radio-label ml-3">
                                                                    <input class="form-radio-input" type="radio" name="jenis_kelamin" value="Perempuan" @if ($dokter->jenis_kelamin=="Perempuan") checked @endif>
                                                                    <span class="form-radio-sign">Perempuan</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Foto</label>
                                                                <input type="file" name="foto" class="form-control-file" value="{{ $dokter->foto }}">
                                                                <input type="hidden" name="current_foto" class="form-control-file" value="{{ $dokter->foto }}">
                                                                <span style="color: red; font-size: 12px">Kosongkan Jika tidak merubah gambar!</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Alamat</label>
                                                                <textarea name="alamat" class="form-control">{{ $dokter->pekerjaan }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer no-bd">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
