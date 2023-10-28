@extends('layouts.user')

@section('title', 'Sign In Admin')

@section('header','Sign In Admin')

@yield('css')

@section('content')
     <div class="content">
            <div class="container">
            <div class="row">
                <div class="col-md-6">
                <img src="images/admin2.png" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="mb-4">
                            <h3>Sign In</h3>
                                <p class="mb-4">System Admin Pengaduan!</p>
                        </div>
                        @if (session('pesan'))
                            <div class="alert alert-danger">
                                {{ session('pesan') }}
                            </div>
                        @endif
                            <form action="{{ route('admin.login') }}" method="POST">
                            @csrf
                            <div class="form-group first">
                                <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" id="username">
                            </div>
                            <div class="form-group last mb-4">
                                <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <input type="submit" value="Log In" class="btn btn-block btn-dark">

                            <div class="d-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                    <input type="checkbox" checked="checked"/>
                            <div class="control__indicator"></div>
                                </label>
                            <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                    </div>
                        <a href="{{ route('pekat.index') }}" class="btn btn-white text-dark mt-3" style="width: 100%">Kembali ke Halaman Utama</a>
                    <span class="d-block text-left my-4 text-muted">&mdash; or login with &mdash;</span>

                    <div class="social-login">
                        <a href="#" class="facebook">
                        <span class="icon-facebook mr-3"></span>
                        </a>
                        <a href="#" class="twitter">
                        <span class="icon-twitter mr-3"></span>
                        </a>
                        <a href="#" class="google">
                        <span class="icon-google mr-3"></span>
                        </a>
                    </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
@endsection
