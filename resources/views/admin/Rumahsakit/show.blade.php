@extends('layouts.admin')

@section('title', 'Detail Ruangan Rumahsakit')

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
</style>
@endsection
@section('header')
<a href="{{ route('rumahsakit.index') }}" class="text-grey" style="font-family: Arial, sans-serif; font-size: 16px; text-decoration: none;">Data User</a>
<a href="#" class="text-grey" style="font-family: Arial, sans-serif; font-size: 16px; text-decoration: none;"> &lt; </a>
<a href="#" class="text-dark" style="font-family: Arial, sans-serif; font-size: 16px; text-decoration: none;">Detail User</a>

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
                            <a href="{{ route('rumahsakit.index') }}"></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-lg-6 col-12">
        <div class="card">
            <div class="card-header">
                <div class="text-center">
                    Detail User Ruangan
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>NIK</th>
                            <td>:</td>
                            <td>{{ $rumahsakit->nik }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td>{{ $rumahsakit->nama }}</td>
                        </tr>
                        <tr>
                            <th>Ruangan</th>
                            <td>:</td>
                            <td>{{ $rumahsakit->ruangan }}</td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td>:</td>
                            <td>{{ $rumahsakit->username }}</td>
                        </tr>
                        <tr>
                            <th>No Telp</th>
                            <td>:</td>
                            <td>{{ $rumahsakit->telp }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


