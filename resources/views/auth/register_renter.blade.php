@extends('frontend.layouts.app_master')
@section('title', 'Register')
@push('css')
<link href="/css/auth.css" rel="stylesheet">
@endpush

@section('content')
<div class="b-auth">
    <div class="auth-header">
        <h1 class="title" style="text-align: center;">Tạo tài khoản người thuê mới</h1>
    </div>
    <div class="auth-content">
        <form action="{{ route('register.nguoithue') }}" method="POST" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="ngaysinh">Ngày sinh</label>
                <input type="date" class="form-control" required placeholder="" name="ngaysinh">
            </div>
            <div class="form-group">
                <label for="diachi">Địa chỉ</label>
                <input type="text" class="form-control" required placeholder="" name="diachi">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-green btn-submit" style="background-color: #10BD85;">Tạo tài
                    khoản</button>
            </div>
            <div class="form-group form-group-register">
                <p class="text-center">Bạn đã có tài khoản? <a class="link" href="{{ route('get.login') }}">Đăng nhập
                        ngay</a></p>
            </div>
        </form>
    </div>
</div>

@include('components.whyus')

@stop

@push('script')
<script src="/js/auth.js"></script>
@endpush
