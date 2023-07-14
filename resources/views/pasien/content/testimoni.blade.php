@extends('pasien.master')
@section('testimoni','active')
@section('pasien.content')

<div class="page-inner">
    <!-- Testimoni -->
    <h4 class="page-title">Testimonial</h4>
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex align-items-center">
                <button class="btn btn-success btn-round ml-auto" data-toggle="modal" data-target="#tambah-testimoni">
                    <i class="fa fa-plus"></i>
                    Buat Testimonial
                </button>
                <div class="modal fade" id="tambah-testimoni" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ route('pasien.testimoni.create') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="modal-header no-bd">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold">
                                        Buat</span>
                                        <span class="fw-light">
                                            Testimonial
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
                                                <label>Testimonial</label>
                                                <textarea name="deskripsi" class="form-control" placeholder="Isi testimoni disini.." required></textarea>
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
            </div>
        </div>
        <div class="col-md-12">
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
            <ul class="timeline">
                @foreach ($data_testimoni as $testimoni)
                <li>
                    <div class="timeline-badge"><i class="flaticon-message"></i></div>
                    <div class="timeline-panel">
                        <div class="timeline-body">
                            <p>{{ $testimoni->deskripsi }}</p>
                            <hr>
                            <div class="btn-group dropdown">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                    <span class="btn-label">
                                        <i class="fa fa-cog"></i>
                                    </span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#edit-testimoni{{ $testimoni->testimoni_id }}">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item hapus-testimoni" href="javascript:void(0)" testimoni-id="{{ $testimoni->testimoni_id }}">Hapus</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>

                <div class="modal fade" id="edit-testimoni{{ $testimoni->testimoni_id }}" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ route('pasien.testimoni.update', $testimoni->testimoni_id) }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="modal-header no-bd">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold">
                                        Edit</span>
                                        <span class="fw-light">
                                            Testimoni
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
                                                <label>Testimoni</label>
                                                <textarea name="deskripsi" class="form-control" placeholder="Isi testimoni disini.." required>{{ $testimoni->deskripsi }}</textarea>
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
                {{-- <li class="timeline-inverted">
                    <div class="timeline-badge"><i class="flaticon-message"></i></div>
                    <div class="timeline-panel">
                        <div class="timeline-body">
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        </div>
                    </div>
                </li> --}}
            </ul>
        </div>
    </div>
</div>

@endsection
