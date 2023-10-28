@extends('layouts.admin')

@section('title', 'Data Pengaduan')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('header', 'User')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Daftar User Ruangan Rumah Sakit</h4>
            <table id="tableRumahsakit" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Ruangan</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rumahsakit as $k => $v)
                    <tr>
                        <td>{{ $k + 1 }}</td>
                        <td>{{ $v->nik }}</td>
                        <td>{{ $v->nama }}</td>
                        <td>{{ $v->ruangan }}</td>
                        <td><a href="{{ route('rumahsakit.show', $v->nik) }}" style="text-decoration: underline">Lihat</a></td>
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
            $('#tableRumahsakit').DataTable();
        });
    </script>
@endsection
