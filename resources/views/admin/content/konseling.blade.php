@extends('admin.master')
@section('konseling','active')
@section('admin.content')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Konsultasi</h4>
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
                    <div class="table-responsive">
                        <table class="add-row display table table-striped table-hover text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>Kategori Konsultasi</th>
                                    <th>Jenis Sesi</th>
                                    <th>Harga</th>
                                    <th>Bukti Pembayaran</th>
                                    <th>Status</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach ($data_konseling as $konseling)
                                <?php $no++; ?>
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $konseling->pasien->nama }}</td>
                                    <td>{{ $konseling->kategori->nama }}</td>
                                    <td>
                                        @if ($konseling->jenis_sesi=="online")
                                            Sesi Online
                                        @else
                                            Sesi Offline
                                        @endif
                                    </td>
                                    <td>@rupiah($konseling->harga)</td>
                                    <td>
                                        @if ($konseling->bukti_pembayaran==NULL)
                                            -
                                        @else
                                            <a href="{{ url('admin-tem/img/buktibayar/'.$konseling->bukti_pembayaran) }}"><img src="{{ url('admin-tem/img/buktibayar/'.$konseling->bukti_pembayaran) }}" width="70px"></a>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($konseling->status=="belum")
                                            Belum Bayar
                                        @elseif ($konseling->status=="konfirmasi" || $konseling->status=="jadwal_ulang")
                                            Pengajuan Dikonfirmasi
                                        @else
                                            Menunggu Konfirmasi
                                        @endif
                                    </td>
                                    <td>
                                        <div class="form-button-action">
                                            @if ($konseling->status=="menunggu")
                                            <button type="button" konseling-id="{{ $konseling->konseling_id }}" class="konfirmasi-konseling btn btn-danger btn-sm">
                                                Konfirmasi
                                            </button>
                                            @else
                                            -
                                            @endif
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
</div>

@endsection
