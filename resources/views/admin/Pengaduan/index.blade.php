@extends('layouts.admin')

@section('title', 'Halaman Dashboard')

@section('header', 'Pengaduan')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Daftar Pengaduan</h4>
            <table id="pengaduanTable" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Isi Laporan</th>
                        <th>Ruangan</th>
                        <th>Status</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengaduan as $k => $v)
                    <tr>
                        <td>{{ $k += 1 }}</td>
                        <td>{{ date('d-M-Y', strtotime($v->tgl_pengaduan)) }}</td>
                        <td>{{ $v->isi_laporan }}</td>
                        <td>{{ $v->nama_ruangan }}</td>
                        <td>
                            @if ($v->status == '0')
                                <span class="label label-danger label-rounded">Pending</span>
                            @elseif ($v->status == 'proses')
                                <span class="label label-warning label-rounded">Proses</span>
                            @else
                                <span class="label label-success label-rounded">Selesai</span>
                            @endif
                        </td>
                        <td><a href="{{ route('pengaduan.show', $v->id_pengaduan) }}" style="text-decoration: underline">Lihat</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#pengaduanTable').DataTable();
        });
    </script>
@endsection
