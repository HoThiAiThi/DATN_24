<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\NguoiDungRequest;
use App\Models\NguoiDung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use PharIo\Manifest\Email;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $data = $request->except('_token');
        $data1 = request()->only('email', 'password');
        $nguoiDung = NguoiDung::where('email', $data1['email'])->first();
        $matKhau = $nguoiDung->matkhau;
       // Log::info('Mật khẩu trong database:', ['pass' => $data1['password']=== $matKhau]);
        // Log::info('Mật khẩu trong database:', ['matkhau' => $matKhau]);


        if ($nguoiDung && $data1['password'] == $matKhau) {

            toastr()->success('Đăng nhập thành công !', 'Thông báo', ['timeOut' => 300]);
            return redirect()->to('/');
        }

        toastr()->error('Email hoặc mật khẩu không chính xác !', 'Thông báo', ['timeOut' => 300]);

        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
