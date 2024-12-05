@extends('admin.layouts.app_master_admin')

@section('content')
<h2 class="mt-3" style="display: flex; justify-content: space-between">
    <span>Danh sách phòng đã thuê</span>
</h2>

@php
$rentals = collect([
    (object) [
        'id' => 1,
        'post_code' => 'BĐ001',
        'landlord_name' => 'Nguyễn Văn A',
        'price' => 2500000,
        'deposit_image' => 'deposit_image_a.jpg',
        'start_date' => '2024-12-01',
        'end_date' => '2024-12-10',
        'status' => 'Đang thuê',
    ],
    (object) [
        'id' => 2,
        'post_code' => 'BĐ002',
        'landlord_name' => 'Trần Thị B',
        'price' => 3000000,
        'deposit_image' => null,
        'start_date' => '2024-11-15',
        'end_date' => '2024-11-30',
        'status' => 'Đã trả',
    ],
    (object) [
        'id' => 3,
        'post_code' => 'BĐ003',
        'landlord_name' => 'Lê Văn C',
        'price' => 2000000,
        'deposit_image' => null,
        'start_date' => '2024-12-05',
        'end_date' => '2024-12-15',
        'status' => 'Chờ xác nhận',
    ],
]);
@endphp

<table class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã bài đăng</th>
            <th>Tên chủ trọ</th>
            <th>Giá</th>
            <th>Ảnh đặt cọc</th>
            <th>Ngày thuê</th>
            <th>Ngày trả</th>
            <th>Trạng thái</th>
            <th>Tác vụ</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rentals ?? [] as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>  
            <td>{{ $item->post_code }}</td>  
            <td>{{ $item->landlord_name }}</td>  
            <td>{{ number_format($item->price, 0, ',', '.') }}đ</td>  
            <td>
                @if ($item->deposit_image)
                <img src="{{ asset('storage/images/' . $item->deposit_image) }}" alt="Đặt cọc" style="max-width: 100px;">
                <br>
                <a href="#" class="text-primary" onclick="showPopup('{{ asset('storage/images/' . $item->deposit_image) }}')">Xem</a>
                @else
                <span>Không có ảnh</span>
                @endif
            </td> 
            <td>{{ \Carbon\Carbon::parse($item->start_date)->format('d/m/Y') }}</td>  
            <td>{{ \Carbon\Carbon::parse($item->end_date)->format('d/m/Y') }}</td>  
            <td>
                <span class="badge {{ $item->status == 'Đang thuê' ? 'bg-success' : ($item->status == 'Đã trả' ? 'bg-secondary' : 'bg-warning') }}">
                    {{ $item->status }}
                </span>
            </td>
            <td>
                <form action="" method="" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                </form>
            </td> 
        </tr>
        @endforeach
    </tbody>
</table>
@stop
