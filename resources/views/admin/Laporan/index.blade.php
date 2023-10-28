@extends('layouts.admin')

@section('title','Laporan Pengaduan')

@section('header', 'Laporan Pengaduan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card">
                <div class="card-header">
                    Cari Berdasarkan Tanggal
                </div>
                <div class="card-body">
                    <form action="{{ route('laporan.getLaporan') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="date" name="from" class="form-control" placeholder="Tanggal Awal" onfocusin="(this.type='date')"
                            onfocusout="(this.type'date')">
                        </div>
                        <div class="form-group">
                            <input type="date" name="to" class="form-control" placeholder="Tanggal Akhir" onfocusin="(this.type='date')"
                            onfocusout="(this.type'date')">
                        </div>
                        <button type="submit" class="btn btn-dark" style="width: 100%">Cari Laporan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-12">
            <div class="card">
                <div class="card-header">
                    Data Berdasarkan Tanggal
                    <div class="float-right">
                        @if($pengaduan ?? '')
                        <a href="{{ route('laporan.cetakLaporan', ['from' => $from, 'to' => $to]) }}" class="btn btn-warning">Export PDF</a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    @if ($pengaduan ?? '')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Ruangan</th>
                                    <th>Isi Laporan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengaduan as $k => $v)
                                <tr>
                                    <td>{{ $k += 1 }}</td>
                                    <td>{{ $v->tgl_pengaduan }}</td>
                                    <td>{{ $v->nama_ruangan }}</td>
                                    <td>{{ $v->isi_laporan }}</td>
                                    <td>
                                        @if ($v->status == '0')
                                            <a href="#" class="badge badge-danger">Pending</a>
                                        @elseif ($v->status == 'proses')
                                            <a href="#" class="badge badge-warning text-white">Proses</a>
                                        @else
                                            <a href="#" class="badge badge-success">Selesai</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="text-center">
                            Tidak ada data
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


