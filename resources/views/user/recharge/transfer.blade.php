@extends('frontend.layouts.app_master')
@section('title', 'Trang chủ')
@push('css')
<link href="/css/home.css" rel="stylesheet">
@endpush

@section('content')
<section class="breadcrumb">
    <ol>
        <li>
            <a href="">
                <span>Trang chủ</span>
            </a>
        </li>
        <li>
            <a href="">
                <span>Phòng</span>
            </a>
        </li>
        <li>
            <span>Danh sách</span>
        </li>
    </ol>
</section>
<h1 class="page-title-h1">Chuyển khoản</h1>
<style>
.alert-warning {
    color: #856404;
    background-color: #fff3cd;
    border-color: #ffeeba;
}
</style>
<div class="alert alert-warning" role="alert">
    <p><strong>Lưu ý quan trọng:</strong></p>
    <p>- Nội dung chuyển tiền bạn vui lòng ghi đúng thông tin sau:</p>
    <p>
    </p>
    <p><strong style="color: red;">"PTDN123 - 104768 - 0949021749"</strong></p>
    <p>Trong đó 104768 là mã thành viên, 0949021749 là số điện thoại của bạn đăng ký trên website phongtrodanang.com.
    </p>
    <p>Xin cảm ơn!</p>
</div>
<table class="table table-bordered table-striped">
    <tbody>
        <tr>
            <td><strong>Ngân hàng</strong></td>
            <td><strong>Chủ tài khoản</strong></td>
            <td><strong>Số tài khoản</strong></td>
            <td><strong>Chi nhánh</strong></td>
            <td><strong>Nội dung chuyển khoản</strong></td>
        </tr>
        <tr>
            <td><strong style="color: red;">VIETCOMBANK</strong> - NGÂN HÀNG THƯƠNG MẠI CỔ PHẦN NGOẠI THƯƠNG VIỆT NAM
            </td>
            <td style="white-space: nowrap;">HỒ THỊ ÁI THI</td>
            <td style="white-space: nowrap;">1027198421<br><button class="btn btn-secondary btn-copy js-btn-copy"
                    title="Sao chép liên kết" data-clipboard-text="0071000939534"><span class="icon-copy">Sao
                        chép</span></button></td>
            <td style="white-space: nowrap;">TP ĐÀ NẴNG</td>
            <td rowspan="6" style="white-space: nowrap; color: red;">Nội dung chuyển khoản, bạn ghi rõ:<br>
                <strong>"PTDN123 - 104768 - 0949021749"</strong><br><button class="btn btn-secondary btn-copy js-btn-copy"
                    title="Sao chép liên kết" data-clipboard-text="PTDN123 - 104768 - 0949021749"><span
                        class="icon-copy">Sao chép</span></button>
            </td>
        </tr>
        <tr>
            <td><strong style="color: red;">VIETINBANK</strong> - NGÂN HÀNG ĐẦU TƯ VÀ PHÁT TRIỂN VIỆT NAM</td>
            <td style="white-space: nowrap;">HỒ THỊ ÁI THI</td>
            <td style="white-space: nowrap;">101872499926<br><button class="btn btn-secondary btn-copy js-btn-copy"
                    title="Sao chép liên kết" data-clipboard-text="31010001745233"><span class="icon-copy">Sao
                        chép</span></button></td>
            <td style="white-space: nowrap;">TP ĐÀ NẴNG</td>
            <!-- <td style="white-space: nowrap; color: red;">PT123 - 104768 - 0949021749</td> -->
        </tr>


    </tbody>
</table>
@stop

@push('script')
<script src="/js/home.js"></script>
@endpush