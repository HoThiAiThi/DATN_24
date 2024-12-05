@extends('admin.layouts.app_master_admin')

@section('content')
<h2 class="mt-3" style="display: flex; justify-content: space-between">
    <span>Danh sách phòng đã lưu</span>
</h2>

@php
$rooms = collect([
    (object) [
        'id' => 1,
        'name' => 'Phòng trọ A',
        'price' => 2500000,
        'address' => '123 Đường ABC, Đà Nẵng',
        'stk_image' => 'stk_image_a.jpg',
        'deposit_image' => 'deposit_image_a.jpg',
        'status' => 'active',
    ],
    (object) [
        'id' => 2,
        'name' => 'Phòng trọ B',
        'price' => 3000000,
        'address' => '456 Đường XYZ, Đà Nẵng',
        'stk_image' => 'stk_image_b.jpg',
        'deposit_image' => null,
        'status' => 'inactive',
    ],
    (object) [
        'id' => 3,
        'name' => 'Phòng trọ C',
        'price' => 2000000,
        'address' => '789 Đường DEF, Đà Nẵng',
        'stk_image' => null,
        'deposit_image' => null,
        'status' => 'active',
    ],
]);
@endphp

<table class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên trọ</th>
            <th>Giá</th>
            <th>Địa chỉ</th>
            <th>Ảnh STK</th>
            <th>Ảnh đặt cọc</th>
            <th>Tác vụ</th>
        </tr>
    </thead>
    <tbody>
        @foreach($rooms ?? [] as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>  
            <td>{{ $item->name }}</td>  
            <td>{{ number_format($item->price, 0, ',', '.') }}đ</td>  
            <td>{{ $item->address }}</td> 
            <td>
                @if ($item->stk_image)
                <img src="{{ asset('storage/images/' . $item->stk_image) }}" alt="STK" style="max-width: 100px;">
                <br>
                <a href="#" class="text-primary" onclick="showPopup('{{ asset('storage/images/' . $item->stk_image) }}')">Xem</a>
                @else
                <span>Không có ảnh</span>
                @endif
            </td> 
            <td>
                @if ($item->deposit_image)
                <img src="{{ asset('storage/images/' . $item->deposit_image) }}" alt="Đặt cọc" style="max-width: 100px;">
                @else
                <span>Không có ảnh</span>
                @endif
                <form action="" method="" enctype="multipart/form-data" style="margin-top: 10px;">
                    @csrf
                    <input type="file" name="deposit_image" class="form-control" accept="image/*">
                    <button type="submit" class="btn btn-primary btn-sm mt-2">Tải lên</button>
                </form>
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
