@extends('pasien.master')
@section('konseling','active')
@section('pasien.content')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('admin-tem/assets/js/core/jquery.3.2.1.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("#jenis_sesi").change(function(){
                console.log("Cek");
                var jenis_sesi = $(this).val();
                if (jenis_sesi=="online") {
                    $('#harga').val("Rp100.000");
                }
                else {
                    $('#harga').val("Rp200.000");
                }
            });

            $("#tombol-ju").click(function(){
                $('.lihat-jadwal').modal('hide');
            });
        });
    </script>
@endsection

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Konsultasi</h4>
                        <button class="btn btn-success btn-round ml-auto" data-toggle="modal" data-target="#tambah-konseling">
                            <i class="fa fa-plus"></i>
                            Pengajuan
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
                    <div class="modal fade" id="tambah-konseling" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('pasien.konseling.create') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                            Pengajuan</span>
                                            <span class="fw-light">
                                                Konsultasi
                                            </span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Kategori</label>
                                                    <select class="form-control" name="kategori_id" required>
                                                        <option value="" disabled selected>--Pilih Kategori--</option>
                                                        @foreach ($data_kategori as $kategori)
                                                            <option value="{{ $kategori->kategori_id }}">{{ $kategori->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group form-group-default">
                                                    <label>Jenis Sesi</label>
                                                    <select class="form-control" name="jenis_sesi" id="jenis_sesi" required>
                                                        <option value="" disabled selected>--Pilih Jenis Sesi--</option>
                                                        <option value="online">Sesi Online</option>
                                                        <option value="offline">Sesi Offline</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group form-group-default">
                                                    <label>Harga</label>
                                                    <input type="text" id="harga" name="harga" class="form-control" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer no-bd">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
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
                                <?php
                                    $no++;
                                    $count  = App\Models\Jadwal::where('konseling_id', $konseling->konseling_id)->count();
                                    if ($count > 0) {
                                        $jadwal = App\Models\Jadwal::where('konseling_id', $konseling->konseling_id)->first();
                                        $jadwal_id = $jadwal->jadwal_id;
                                        $date = date('Y-m-d', strtotime($jadwal->tanggal_konseling));
                                        $count_jb = App\Models\JadwalUlang::where('jadwal_id', $jadwal->jadwal_id)->count();
                                        if ($count_jb > 0) {
                                            $jb = App\Models\JadwalUlang::where('jadwal_id', $jadwal->jadwal_id)->first();
                                            $date_dari = date('Y-m-d', strtotime($jb->dari));
                                            $date_sampai = date('Y-m-d', strtotime($jb->sampai));
                                        }
                                        else {
                                            $date_dari = date('Y-m-d');
                                            $date_sampai = date('Y-m-d');
                                        }
                                    }
                                    else {
                                        $jadwal_id = '';
                                        $date = date('Y-m-d');
                                        $date_dari = date('Y-m-d');
                                        $date_sampai = date('Y-m-d');
                                    }
                                    $count_ju = App\Models\JadwalUlang::where('konseling_id', $konseling->konseling_id)->count();
                                ?>
                                <tr>
                                    <td>{{ $no }}</td>
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
                                            @if ($konseling->status=="belum")
                                            <button type="button" data-toggle="modal" data-target="#konfirmasi-bayar{{ $konseling->konseling_id }}" class="btn btn-danger btn-sm">
                                                Konfirmasi Pembayaran
                                            </button>
                                            @elseif ($konseling->status=="konfirmasi" || $konseling->status=="jadwal_ulang")
                                                @if ($count > 0)
                                                    @if ($count_ju > 0)
                                                        <button type="button" data-toggle="modal" data-target="#lihat-jadwalulang{{ $konseling->konseling_id }}" class="btn btn-success btn-sm">
                                                            Lihat Pengajuan Jadwal Ulang
                                                        </button>
                                                    @else
                                                        <button type="button" data-toggle="modal" data-target="#lihat-jadwal{{ $konseling->konseling_id }}" class="btn btn-success btn-sm">
                                                            Lihat Jadwal
                                                        </button>
                                                    @endif
                                                @else
                                                -
                                                @endif
                                            @else
                                            -
                                            @endif
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="konfirmasi-bayar{{ $konseling->konseling_id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('pasien.konseling.bayar', $konseling->konseling_id) }}" enctype="multipart/form-data" method="POST">
                                                @csrf
                                                <div class="modal-header no-bd">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold">
                                                        Konfirmasi</span>
                                                        <span class="fw-light">
                                                            Pembayaran
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
                                                                <label>Bukti Pembayaran</label>
                                                                <input type="file" name="bukti_bayar" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer no-bd">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade lihat-jadwal" id="lihat-jadwal{{ $konseling->konseling_id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{ route('pasien.konseling.jadwal-setuju', $konseling->konseling_id) }}" enctype="multipart/form-data" method="POST">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header no-bd">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold">
                                                        Jadwal</span>
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
                                                                <label>Tanggal Konseling</label>
                                                                <input type="date" class="form-control" value="{{ $date }}" readonly>
                                                            </div>
                                                            @if ($konseling->status_sesi=="nonaktif")
                                                            <div class="form-group form-group-default">
                                                                <span style="color:red">*Klik tombol Setuju, untuk menyetujui jadwal konseling</span><br>
                                                                <span style="color:red">*Klik tombol Ajukan Jadwal Ulang, untuk meminta jadwal konseling baru</span><br>
                                                                <span style="color:red">*Pengajuan jadwal konseling baru hanya bisa dilakukan satu kali!</span>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer no-bd">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    @if ($konseling->status_sesi=="nonaktif")
                                                    <button type="submit" class="btn btn-success">Setuju</button>
                                                    <button type="button" data-toggle="modal" id="tombol-ju" data-target="#jadwal-ulang{{ $konseling->konseling_id }}" class="btn btn-warning">
                                                        Ajukan Jadwal Ulang
                                                    </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="modal fade" id="jadwal-ulang{{ $konseling->konseling_id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('pasien.konseling.jadwal', $konseling->konseling_id) }}" enctype="multipart/form-data" method="POST">
                                                @csrf
                                                <div class="modal-header no-bd">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold">
                                                        Pengajuan</span>
                                                        <span class="fw-light">
                                                            Jadwal Ulang
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
                                                                <label>Dari Tanggal</label>
                                                                <input type="hidden" name="jadwal_id" value="{{ $jadwal_id }}">
                                                                <input type="date" name="dari" class="form-control" value="{{ $date }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-group-default">
                                                                <label>Sampai Tanggal</label>
                                                                <input type="date" name="sampai" class="form-control" value="{{ $date }}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer no-bd">
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade lihat-jadwal" id="lihat-jadwalulang{{ $konseling->konseling_id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{ route('pasien.konseling.jadwal-setuju', $konseling->konseling_id) }}" enctype="multipart/form-data" method="POST">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header no-bd">
                                                    <h5 class="modal-title">
                                                        <span class="fw-mediumbold">
                                                        Pengajuan</span>
                                                        <span class="fw-light">
                                                            Jadwal Ulang Konseling
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
                                                                <label>Dari Tanggal</label>
                                                                <input type="date" class="form-control" value="{{ $date_dari }}" readonly>
                                                            </div>
                                                            <div class="form-group form-group-default">
                                                                <label>Sampai Tanggal</label>
                                                                <input type="date" class="form-control" value="{{ $date_sampai }}" readonly>
                                                            </div>
                                                            @if ($konseling->status_sesi=="nonaktif")
                                                            @if ($count > 0)
                                                            @if ($konseling->jadwal->updated_at!=$konseling->jadwal->created_at)
                                                            <div class="form-group form-group-default">
                                                                <label>Tanggal Konseling Baru</label>
                                                                <input type="date" class="form-control" value="{{ $date }}" readonly>
                                                            </div>
                                                            {{-- @endif
                                                            @if ($konseling->status_sesi=="nonaktif") --}}
                                                            <div class="form-group form-group-default">
                                                                <span style="color:red">*Klik tombol <b>Setuju</b>, untuk menyetujui jadwal konseling baru</span><br>
                                                            </div>
                                                            @endif
                                                            @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer no-bd">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    @if ($konseling->status_sesi=="nonaktif")
                                                    @if ($count > 0)
                                                    @if ($konseling->jadwal->updated_at!=$konseling->jadwal->created_at)
                                                    <button type="submit" class="btn btn-success">Setuju</button>
                                                    @endif
                                                    @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </form>
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
