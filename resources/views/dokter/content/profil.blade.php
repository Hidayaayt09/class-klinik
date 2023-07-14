@extends('dokter.master')
@section('dokter.content')

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Profil {{ Auth::guard('dokter')->user()->nama }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-profile">
                <div class="card-header" style="background-image: url('{{ asset('admin-tem/assets/img/klinik.webp') }}')">
                    <div class="profile-picture">
                        <div class="avatar avatar-xl">
                            <img src="{{ asset('admin-tem/assets/img/doctor.png') }}" alt="..." class="avatar-img rounded-circle">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="user-profile text-center">
                        <div class="name">{{ $dokter->nama }}</div>
                        <div class="job">{{ $dokter->no_wa }}</div>
                        <div class="desc">{{ $dokter->alamat }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Profil</div>
                </div>
                @if (session('e-berhasil'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>{{ session('e-berhasil') }}</strong>
                    </div>
                @endif
                <form action="{{ route('dokter.profil.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $dokter->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="no_wa">No. Whatsapp</label>
                            <input type="text" class="form-control" id="no_wa" name="no_wa" value="{{ $dokter->no_wa }}">
                        </div>
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
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="5">{{ $dokter->alamat }}</textarea>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="card-title">Ubah Password</div>
                </div>
                @if (session('ep-berhasil'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>{{ session('ep-berhasil') }}</strong>
                    </div>
                @endif
                @if (session('ep-gagal'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>{{ session('ep-gagal') }}</strong>
                    </div>
                @endif
                <form action="{{ route('dokter.profil.password') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="current_password">Password Saat Ini</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Password Saat Ini">
                        </div>
                        <div class="form-group">
                            <label for="password">Password Baru</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password Baru">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password Baru">
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
