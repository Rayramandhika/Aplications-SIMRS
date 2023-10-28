@extends('layouts.admin')

@section('title', 'Halaman Dashboard')

@section('header','Dashboard')

@yield('css')

@section('content')
<div class="container-fluid">

    <center><div class="card">
        <div class="card-body">
            <h4 class="card-title mb-0">Pengaduan Selesai</h4>
            <h2 class="font-light"> {{ $selesai }} <span class="font-16 text-success font-medium"></span>
            </h2>
            <div class="mt-4">
                <div class="row text-center">
                    <div class="col-6 border-right">
                        <h4 class="mb-0">{{ $pending }}</h4>
                        <span class="font-14 text-muted">Pengaduan Pending</span>
                    </div>
                    <div class="col-6">
                        <h4 class="mb-0">{{ $rumahsakit }}</h4>
                        <span class="font-14 text-muted">Ruangan Users</span>
                    </div>
                    <div class="mt-4">
                        <div class="row text-center">
                            <div class="col-6 border-right">
                                <h4 class="mb-0">{{ $proses }}</h4>
                                <span class="font-14 text-muted">Pengaduan Proses</span>
                            </div>
                            <div class="col-6">
                                <h4 class="mb-0">{{ $petugas }}</h4>
                                <span class="font-14 text-muted">Petugas Users</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</center>
<!-- ============================================================== -->
<!-- Email campaign chart -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Ravenue - page-view-bounce rate -->
<!-- ============================================================== -->
<div class="row">
    @foreach ($totalLaporanPerTanggal as $total)
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Laporan Masuk Per Tanggal</h4>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="border-top-0">Jumlah</th>
                            <th class="border-top-0">Hari</th>
                            <th class="border-top-0">Tanggal</th>
                            <th class="border-top-0">Tahun</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="txt-oflo">{{ $total->total }}</td>
                            <td><span class="label label-success label-rounded">{{ date('l', strtotime($total->tanggal)) }}</span> </td>
                            <td class="txt-oflo">{{ date('F d', strtotime($total->tanggal)) }}</td>
                            <td><span class="font-medium">{{ date('Y', strtotime($total->tanggal)) }}</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endforeach
</div>


@endsection
