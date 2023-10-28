@extends('layouts.admin')

@section('title', 'Halaman Dashboard')

@section('header', 'Petugas')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="container-fluid">
    <a href="{{ route('petugas.create') }}" class="btn btn-dark mb-2"> + Create Petugas</a>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Daftar Petugas</h4>
            <table id="petugasTable" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Petugas</th>
                        <th>Username</th>
                        <th>Telp</th>
                        <th>Level</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($petugas as $k => $v)
                    <tr>
                        <td>{{ $k + 1 }}</td>
                        <td>{{ $v->nama_petugas }}</td>
                        <td>{{ $v->username }}</td>
                        <td>{{ $v->telp }}</td>
                        <td>{{ $v->level }}</td>
                        <td><a href="{{ route('petugas.edit', $v->id_petugas) }}" style="text-decoration: underline">Edit</a></td>
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
            $('#petugasTable').DataTable();
        });
    </script>
@endsection
