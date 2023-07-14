@extends('admin.master')
@section('data-master','active submenu')
@section('collapse','show')
@section('gejala','active')
@section('admin.content')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Gejala</h4>
                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambah-gejala">
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
                        <button class="btn btn-success btn-round ml-auto" data-toggle="modal" data-target="#import-gejala">
                            <i class="fa fa-plus"></i>
                            Import Excel
                        </button>
                    </div>
                </div> --}}
                <div class="card-body">
                    <!-- Modal -->
                    <div class="modal fade" id="tambah-gejala" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('admin.gejala.create') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                            Tambah</span>
                                            <span class="fw-light">
                                                Gejala
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
                                                    <label>Nama Kategori</label>
                                                    <select class="form-control" name="kategori_id" required>
                                                        <option value="" disabled selected>--Pilih Kategori--</option>
                                                        @foreach ($data_kategori as $kategori)
                                                            <option value="{{ $kategori->kategori_id }}">{{ $kategori->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group form-group-default">
                                                    <label>Nama Gejala</label>
                                                    <input type="text" name="nama_gejala" class="form-control" placeholder="Nama Gejala.." required>
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

                    <div class="modal fade" id="import-gejala" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('admin.gejala.import') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                            Import</span>
                                            <span class="fw-light">
                                                Gejala
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
                                    <th>Kategori Konsultasi</th>
                                    <th>Nama Gejala</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ($data_gejala as $gejala)
                                <?php $no++; ?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $gejala->kategori->nama }}</td>
                                    <td>{{ $gejala->nama_gejala }}</td>
                                    <td>
                                        <div class="form-button-action">
                                            <button type="button" data-toggle="modal" data-target="#edit-gejala{{ $gejala->gejala_id }}" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Gejala">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" gejala-id="{{ $gejala->gejala_id }}" class="hapus-gejala btn btn-link btn-danger" data-original-title="Hapus Gejala">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="edit-gejala{{ $gejala->gejala_id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('admin.gejala.update', $gejala->gejala_id) }}" enctype="multipart/form-data" method="POST">
                                                @csrf
                                                <div class="modal-header no-bd">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold">
                                                        Edit</span>
                                                        <span class="fw-light">
                                                            Gejala
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
                                                                <label>Nama Kategori</label>
                                                                <select class="form-control" name="kategori_id" required>
                                                                    <option value="" disabled>--Pilih Kategori--</option>
                                                                    @foreach ($data_kategori as $kategori)
                                                                        <option value="{{ $kategori->kategori_id }}" @if($kategori->kategori_id==$gejala->kategori_id) selected @endif>{{ $kategori->nama }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group form-group-default">
                                                                <label>Nama Gejala</label>
                                                                <input type="text" name="nama_gejala" class="form-control" value="{{ $gejala->nama_gejala }}" required>
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
