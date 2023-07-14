@extends('admin.master')
@section('jadwal','active')
@section('admin.content')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Jadwal Konsultasi</h4>
                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambah-jadwal">
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
                <div class="card-body">
                    <!-- Modal -->
                    <div class="modal fade" id="tambah-jadwal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('admin.jadwal.create') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                            Tambah</span>
                                            <span class="fw-light">
                                                Jadwal Konsultasi
                                            </span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php $date = date('Y-m-d'); ?>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Nama Pasien</label>
                                                    <select class="form-control" name="konseling_id" required>
                                                        <option value="" disabled selected>--Pilih Pasien--</option>
                                                        @foreach ($data_konseling as $konseling)
                                                            <option value="{{ $konseling->konseling_id }}">{{ $konseling->pasien->nama }} - {{ $konseling->kategori->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group form-group-default">
                                                    <label>Tanggal Konsultasi</label>
                                                    <input type="date" name="tanggal_konseling" class="form-control" value="{{ $date }}" required>
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
                                    <th>Nama Pasien</th>
                                    <th>Tanggal Konsultasi</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ($data_jadwal as $jadwal)
                                <?php $no++; ?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $jadwal->konseling->pasien->nama }}</td>
                                    <td>{{ $jadwal->tanggal_konseling }}</td>
                                    <td>
                                        <div class="form-button-action">
                                            @if ($jadwal->konseling->status=="jadwal_ulang")
                                            <button type="button" data-toggle="modal" data-target="#edit-jadwal{{ $jadwal->jadwal_id }}" class="btn btn-primary btn-sm">
                                                Jadwal Ulang
                                            </button>
                                            @else
                                            -
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="edit-jadwal{{ $jadwal->jadwal_id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('admin.jadwal.update', $jadwal->jadwal_id) }}" enctype="multipart/form-data" method="POST">
                                                @csrf
                                                <div class="modal-header no-bd">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold">
                                                        Edit</span>
                                                        <span class="fw-light">
                                                            Jadwal Konsultasi
                                                        </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php
                                                        $d = date('Y-m-d', strtotime($jadwal->tanggal_konseling));

                                                        $count  = App\Models\JadwalUlang::where('jadwal_id', $jadwal->jadwal_id)->count();
                                                        if ($count > 0) {
                                                            $jb = App\Models\JadwalUlang::where('jadwal_id', $jadwal->jadwal_id)->first();
                                                            $date_dari = date('Y-m-d', strtotime($jb->dari));
                                                            $date_sampai = date('Y-m-d', strtotime($jb->sampai));
                                                        }
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Nama Pasien</label>
                                                                <input type="hidden" name="konseling_id" value="{{ $jadwal->konseling_id }}">
                                                                <input type="text" class="form-control" value="{{ $jadwal->konseling->pasien->nama }} - {{ $jadwal->konseling->kategori->nama }}" readonly>
                                                            </div>
                                                        </div>
                                                        @if ($count > 0)
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Dari Tanggal</label>
                                                                <input type="date" class="form-control" value="{{ $date_dari }}" readonly>
                                                            </div>
                                                            <div class="form-group form-group-default">
                                                                <label>Sampai Tanggal</label>
                                                                <input type="date" class="form-control" value="{{ $date_sampai }}" readonly>
                                                            </div>
                                                        </div>
                                                        @endif
                                                        <div class="col-md-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Tanggal Konsultasi</label>
                                                                <input type="date" name="tanggal_konseling" class="form-control" value="{{ $d }}" required>
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
