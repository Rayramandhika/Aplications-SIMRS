@extends('layouts.admin')

@section('title', 'Detail Pengaduan')

@section('css')
    <style>
        .text-primary:hover {
            text-decoration: underline;
        }

        .text-grey {
            color: #888888;
        }

        .text-blue:hover {
            color: #020202;
        }

        .text-grey:hover {
            color: #dae201;
        }

        .text-dark:hover {
            color: #ffffff;
        }

        .btn-purple {
            background: #ca14ca;
            border: 1px solid #925e92;
            color: #ffffff;
            width: 100%;
        }
    </style>
@endsection

@section('header')
<a href="{{ route('pengaduan.index') }}" class="text-grey" style="font-family: Arial, sans-serif; font-size: 16px; text-decoration: none;">Data Pengaduan</a>
<a href="#" class="text-grey" style="font-family: Arial, sans-serif; font-size: 16px; text-decoration: none;"> &lt; </a>
<a href="#" class="text-dark" style="font-family: Arial, sans-serif; font-size: 16px; text-decoration: none;">Detail Pengaduan</a>

@endsection

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title"></h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('pengaduan.index') }}"></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-lg-5 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center">
                            {{ $pengaduan->nama_ruangan }}
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td>{{ $pengaduan->nik}}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pengaduan</td>
                                    <td>:</td>
                                    <td>{{ $pengaduan->tgl_pengaduan }}</td>
                                </tr>
                                <tr>
                                    <td>Foto</td>
                                    <td>:</td>
                                    <td><img src="{{ Storage::url($pengaduan->foto) }}" alt="Foto Pengaduan" class="embed-responsive"></td>
                                </tr>
                                <tr>
                                    <td>Isi Laporan</td>
                                    <td>:</td>
                                    <td>{{ $pengaduan->isi_laporan }}</td>
                                </tr>
                                <tr>
                                    <td>Ruangan</td>
                                    <td>:</td>
                                    <td>{{ $pengaduan->nama_ruangan }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td>
                                        @if ($pengaduan->status == '0')
                                        <a href="#" class="label label-danger label-rounded">Pending</a>
                                        @elseif ($pengaduan->status == 'proses')
                                            <a href="#" class="label label-warning label-rounded">Proses</a>
                                        @else
                                            <a href="#" class="label label-success label-rounded">Selesai</a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center">
                            Tanggapan Petugas
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('tanggapan.createOrUpdate') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id_pengaduan }}">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <div class="input-group mb-3">
                                        <select name="status" id="status" class="custom-select" style="background-color: #f2f2f2; color: #333; border: 1px solid #ccc; border-radius: 5px; padding: 5px; width: 100%;">
                                            <option value="0" {{ $pengaduan->status == '0' ? 'selected' : '' }}>Pending</option>
                                            <option value="proses" {{ $pengaduan->status == 'proses' ? 'selected' : '' }}>Proses</option>
                                            <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                        </select>
                                    </div>
                                </div>

                            <div class="form-group">
                                <label for="tanggapan">Tanggapan</label>
                                <textarea name="tanggapan" id="tanggapan" rows="4" class="form-control" placeholder="Belum ada tanggapan">{{ $tanggapan->tanggapan ?? '' }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-dark">Send</button>
                        </form>
                        @if (Session::has('status'))
                            <div class="alert alert-success mt-2">
                                {{ Session::get('status') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
@endsection
