@extends('admin.master')
@section('data-master','active submenu')
@section('collapse','show')
@section('kategori','active')
@section('admin.content')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Kategori Konsultasi</h4>
                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambah-kategori">
                            <i class="fa fa-plus"></i>
                            Tambah
                        </button>
                    </div>
                </div>
                @if (session('berhasil'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>{{ session('berhasil') }}</strong>
                    </div>
                @endif
                @if (session('gagal'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>{{ session('gagal') }}</strong>
                    </div>
                @endif
                {{-- <div class="card-header">
                    <div class="d-flex align-items-center">
                        <button class="btn btn-success btn-round ml-auto" data-toggle="modal" data-target="#import-kategori">
                            <i class="fa fa-plus"></i>
                            Import Excel
                        </button>
                    </div>
                </div> --}}
                <div class="card-body">
                    <!-- Modal -->
                    <div class="modal fade" id="tambah-kategori" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('admin.kategori.create') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                            Tambah</span>
                                            <span class="fw-light">
                                                Kategori Konsultasi
                                            </span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Nama</label>
                                                    <input type="text" name="nama" class="form-control" placeholder="Nama Kategori Konsultasi.." required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group form-group-default">
                                                    <label>Deskripsi</label>
                                                    <textarea name="deskripsi" class="form-control" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group form-group-default">
                                                    <label>Foto</label>
                                                    <input type="file" name="foto" class="form-control-file" required>
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

                    <div class="modal fade" id="import-kategori" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('admin.kategori.import') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                            Import</span>
                                            <span class="fw-light">
                                                Kategori Konsultasi
                                            </span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group form-group-default">
                                                    <label>File Excel</label>
                                                    <input type="file" name="file" class="form-control-file">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer no-bd">
                                        <button type="submit" class="btn btn-primary">Import</button>
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
                                    <th>Deskripsi</th>
                                    <th>Foto</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ($data_kategori as $kategori)
                                <?php $no++; ?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $kategori->nama }}</td>
                                    <td>{{ $kategori->deskripsi }}</td>
                                    <td>
                                        <a href="{{ url('admin-tem/img/kategori/'.$kategori->foto) }}"><img src="{{ url('admin-tem/img/kategori/'.$kategori->foto) }}" width="100px"></a>
                                    </td>
                                    <td>
                                        <div class="form-button-action">
                                            <button type="button" data-toggle="modal" data-target="#edit-kategori{{ $kategori->kategori_id }}" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Kategori Konsultasi">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" kategori-id="{{ $kategori->kategori_id }}" class="hapus-kategori btn btn-link btn-danger" data-original-title="Hapus Kategori Konsultasi">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="edit-kategori{{ $kategori->kategori_id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('admin.kategori.update', $kategori->kategori_id) }}" enctype="multipart/form-data" method="POST">
                                                @csrf
                                                <div class="modal-header no-bd">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold">
                                                        Edit</span>
                                                        <span class="fw-light">
                                                            Kategori Konsultasi
                                                        </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Nama</label>
                                                                <input type="text" name="nama" class="form-control" value="{{ $kategori->nama }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Deskripsi</label>
                                                                <textarea name="deskripsi" class="form-control" required>{{ $kategori->deskripsi }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Foto</label>
                                                                <input type="file" name="foto" class="form-control-file" value="{{ $kategori->foto }}">
                                                                <input type="hidden" name="current_foto" class="form-control-file" value="{{ $kategori->foto }}">
                                                                <span style="color: red; font-size: 12px">Kosongkan Jika tidak merubah gambar!</span>
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
