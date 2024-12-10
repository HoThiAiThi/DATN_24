@extends('frontend.layouts.app_master')
@section('title', 'Register')
@push('css')
    <link href="/css/auth.css" rel="stylesheet">
@endpush

@section('content')
<div class="b-auth">
    <div class="auth-header">
        <h1 class="title" style="text-align: center;">Tạo tài khoản mới</h1>
    </div>
    <div class="auth-content">
        <form action="" method="POST" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="ten">Họ tên</label>
                <input type="text" class="form-control" required placeholder="" name="ten">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" required placeholder="" name="email">
            </div>
            <div class="form-group">
                <label for="sodienthoai">Số điện thoại</label>
                <input type="text" class="form-control" required placeholder="" name="sodienthoai">
            </div>
            <div class="form-group">
                <label for="matkhau">Mật khẩu</label>
                <input type="password" class="form-control" required placeholder="" name="matkhau">
            </div>
            <!-- <div class="form-group" style="display: flex; justify-content: center; gap: 10px; margin-top: 20px;">
                <a href="{{ route('get.register.landlord') }}" class="btn btn-green" style="background-color: #10BD85; padding: 10px 20px; text-decoration: none; color: white; display: inline-block; text-align: center;">
                    Chủ trọ
                </a>
                <a href="{{ route('get.register.renter') }}" class="btn btn-green" style="background-color: #10BD85; padding: 10px 20px; text-decoration: none; color: white; display: inline-block; text-align: center;">
                    Người thuê
                </a>
            </div> -->

            <div class="form-group"
                style="display: flex; justify-content: center; gap: 10px; margin-top: 20px; margin-bottom: 20px;">
                <button type="submit" name="role" value="nguoithue" class="btn btn-green btn-submit"
                    style="background-color: #10BD85; padding: 10px 20px; color: white;">Người Thuê</button>
                <button type="submit" name="role" value="chutro" class="btn btn-green btn-submit"
                    style="background-color: #10BD85; padding: 10px 20px; color: white;">Chủ Trọ</button>
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
