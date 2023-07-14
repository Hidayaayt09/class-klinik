@extends('pasien.master')
@section('konseling','active')
@section('pasien.content')

<div class="page-inner">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Konseling</div>
                </div>
                <div class="card-body pb-0">
                    @foreach ($data_kategori as $kategori)
                        <div class="d-flex">
                            <div class="avatar">
                                <img src="{{ url('admin-tem/img/konseling/'.$kategori->foto) }}" alt="..." class="avatar-img rounded-circle">
                            </div>
                            <div class="flex-1 pt-1 ml-2">
                                <h6 class="fw-bold mb-1">{{ $kategori->nama }}</h6>
                                <small class="text-muted">{{ $kategori->deskripsi }}</small>
                            </div>
                            <div class="d-flex ml-auto align-items-center">
                                <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#pilih-kategori{{ $kategori->kategori_id }}"><b>Pilih</b></button>
                            </div>
                        </div>
                        <div class="separator-dashed"></div>

                        <div class="modal fade" id="pilih-kategori{{ $kategori->kategori_id }}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="{{ route('pasien.konseling.create', $kategori->kategori_id) }}" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold">
                                                Pembayaran</span>
                                                <span class="fw-light">
                                                    Konseling
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
                                                        <input type="text" name="nama" class="form-control" value="{{ $kategori->nama }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer no-bd">
                                            <button type="submit" class="btn btn-primary">Bayar</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card full-height">
                <div class="card-header">
                    <div class="card-head-row">
                        <div class="card-title">Riwayat Pembayaran</div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-1 ml-3 pt-1">
                            <h6 class="text-uppercase fw-bold mb-1">Fobia <span class="text-warning pl-3">menunggu konfirmasi</span></h6>
                            <span class="text-muted">I am facing some trouble with my viewport. When i start my</span>
                        </div>
                        <div class="float-right pt-1">
                            <small class="text-muted">8:40 PM</small>
                        </div>
                    </div>
                    <div class="separator-dashed"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
