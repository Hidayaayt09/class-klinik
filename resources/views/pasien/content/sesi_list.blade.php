@extends('pasien.master')
@section('sesi','active')
@section('pasien.content')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Daftar Sesi Konsultasi Online</h4>
                </div>
            </div>
            <div class="card-body">
                <ol class="activity-feed">
                    @if ($count_sesi > 0)
                        @foreach ($data_sesi as $sesi)
                        <?php
                        $status_sesi = App\Models\Konseling::where(['konseling_id'=>$sesi->konseling_id, 'status_sesi' => 'aktif'])->count();
                        $count  = App\Models\Jadwal::where('konseling_id', $sesi->konseling_id)->count();
                        $date   = date('d-m-Y');
                        ?>
                        @if ($status_sesi > 0)
                            @if ($count > 0)
                            <li class="feed-item feed-item-info">
                                <time class="date" datetime="9-21">{{ $sesi->jadwal->tanggal_konseling }}</time>
                                <span class="text">Klik untuk melakukan sesi Konsultasi online <a href="{{ route('pasien.sesi.chat', $sesi->jadwal->jadwal_id) }}">"{{ $sesi->kategori->nama }}"</a></span>
                            </li>
                            @else
                            <li class="feed-item feed-item-danger">
                                <span class="text">Sesi Konsultasi online belum ada.</span>
                            </li>
                            @endif
                        @else
                            <li class="feed-item feed-item-danger">
                                <span class="text">Sesi Konsultasi online belum ada.</span>
                            </li>
                        @endif
                        @endforeach
                    @else
                        <li class="feed-item feed-item-danger">
                            <span class="text">Sesi Konsultasi online belum ada.</span>
                        </li>
                    @endif
                </ol>
            </div>
        </div>
    </div>
</div>

@endsection
