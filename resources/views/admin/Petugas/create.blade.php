@extends('layouts.admin')

@section('title', 'Form Tambah Petugas')

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
<a href="{{ route('petugas.index') }}" class="text-grey" style="font-family: Arial, sans-serif; font-size: 16px; text-decoration: none;">Data Petugas</a>
<a href="#" class="text-grey" style="font-family: Arial, sans-serif; font-size: 16px; text-decoration: none;"> &lt; </a>
<a href="#" class="text-dark" style="font-family: Arial, sans-serif; font-size: 16px; text-decoration: none;"> Create Petugas</a>

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
                            <a href="{{ route('petugas.index') }}"></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-12"> <!-- Fixed typo here; "col-12" instead of "lg-12" -->
            <div class="card">
                <div class="card-header">
                    Form Tambah Petugas <!-- Updated the form title to match your 'title' -->
                </div>
                <div class="card-body">
                    <form action="{{ route('petugas.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_petugas">Nama Petugas</label>
                            <input type="text" name="nama_petugas" id="nama_petugas" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="telp">No Telp</label>
                            <input type="number" name="telp" id="telp" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <div class="input-group mb-3">
                                <select name="level" id="level" class="custom-select" style="background-color: #f2f2f2; color: #333; border: 1px solid #ccc; border-radius: 5px; padding: 5px; width: 100%;">
                                    <option value="petugas" selected>Pilih Level (Default Petugas)</option>
                                    <option value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark" style="width: 100%">Save</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12">
            @if (Session::has('username'))
                <div class="alert alert-danger">
                    {{ Session::get('username') }}
                </div>
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $error) <!-- Change $errors to $error to fix the variable name -->
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection

