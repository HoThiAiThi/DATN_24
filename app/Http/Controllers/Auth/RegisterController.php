<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\NguoiDung;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Collection;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->except('_token');
        Log::info('Register Data:', ['data' => $data]);

        // Xử lý mật khẩu và thêm thông tin mặc định
        $data['ngaytao'] = Carbon::now();
        $data['quyen'] = $request->input('role') === 'chutro' ? 'chutro' : 'nguoithue'; // Gán quyền dựa trên role

        // Tạo người dùng
        $user = NguoiDung::create($data);
        if ($user) {
            session(['user' => $user]);
            if ($data['quyen'] === 'chutro') {
                return redirect()->route('get.register.landlord'); // Chuyển hướng đến màn hình chủ trọ
            } else {
                return redirect()->route('get.register.renter'); // Chuyển hướng đến màn hình người thuê
            }

        }

        return redirect()->back()->with('error', 'Đăng ký thất bại!');
    }

}
