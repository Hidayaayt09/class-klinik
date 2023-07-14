@extends('admin.master')
@section('rule','active')
@section('admin.content')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Nilai Kategori Gejala</h4>
                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambah-rule">
                            <i class="fa fa-plus"></i>
                            Tambah
                        </button>
                    </div>
                </div>
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <button class="btn btn-success btn-round ml-auto" data-toggle="modal" data-target="#import-rule">
                            <i class="fa fa-plus"></i>
                            Import Excel
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Modal -->
                    <div class="modal fade" id="tambah-rule" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('admin.rule.create') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                            Tambah</span>
                                            <span class="fw-light">
                                                Nilai Kategori Gejala
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
                                                    <select class="form-control" name="kategori_id">
                                                        <option value="" disabled selected>--Pilih Kategori--</option>
                                                        @foreach ($data_kategori as $kategori)
                                                            <option value="{{ $kategori->kategori_id }}">{{ $kategori->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Nama Gejala</label>
                                                    <select class="form-control" name="gejala_id">
                                                        <option value="" disabled selected>--Pilih Gejala--</option>
                                                        @foreach ($data_gejala as $gejala)
                                                            <option value="{{ $gejala->gejala_id }}">{{ $gejala->nama_gejala }}</option>
                                                        @endforeach
                                                    </select>
                                                    {{-- <input type="text" name="nama_gejala" id="nama_gejala" class="form-control" placeholder="Nama Gejala.."> --}}
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Gejala ID</label>
                                                    <input type="text" name="gejala_id" id="gejala_id" class="form-control">
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

                    <div class="modal fade" id="import-rule" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('admin.rule.import') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                            Import</span>
                                            <span class="fw-light">
                                                Nilai Kategori Gejala
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
                                    <th>Nama Kategori Konsultasi</th>
                                    <th>Nama Gejala</th>
                                    <th>Nilai</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ($data_nilai as $rule)
                                <?php $no++; ?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $rule->kategori->nama }}</td>
                                    <td>{{ $rule->gejala->nama_gejala }}</td>
                                    <td>{{ $rule->nilai }}</td>
                                    <td>
                                        <div class="form-button-action">
                                            <button type="button" data-toggle="modal" data-target="#edit-rule{{ $rule->rule_id }}" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Nilai Kategori Gejala">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" rule-id="{{ $rule->rule_id }}" class="hapus-rule btn btn-link btn-danger" data-original-title="Hapus Nilai Kategori Gejala">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="edit-rule{{ $rule->rule_id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('admin.rule.update', $rule->rule_id) }}" enctype="multipart/form-data" method="POST">
                                                @csrf
                                                <div class="modal-header no-bd">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold">
                                                        Edit</span>
                                                        <span class="fw-light">
                                                            Nilai Kategori Gejala
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
                                                                <select class="form-control" name="kategori_id">
                                                                    <option value="" disabled>--Pilih Kategori--</option>
                                                                    @foreach ($data_kategori as $kategori)
                                                                        <option value="{{ $kategori->kategori_id }}" @if($kategori->kategori_id==$rule->kategori_id) selected @endif>{{ $kategori->nama }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Nama Gejala</label>
                                                                <select class="form-control" name="gejala_id">
                                                                    <option value="" disabled>--Pilih Gejala--</option>
                                                                    @foreach ($data_gejala as $gejala)
                                                                        <option value="{{ $gejala->gejala_id }}" @if($gejala->gejala_id==$rule->gejala_id) selected @endif>{{ $gejala->nama_gejala }}</option>
                                                                    @endforeach
                                                                </select>
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
