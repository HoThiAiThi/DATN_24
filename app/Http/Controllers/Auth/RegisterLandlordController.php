<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\NguoiDung;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Collection;

class RegisterLandlordController extends Controller
{
    public function index()
    {
        return view('auth.register_landlord');
    }

    public function register(Request $request)
    {
        $data =  $request->except('_token');
        $data['password'] = bcrypt($request->password);
        $data['ngaytao'] = Carbon::now();

        $user = NguoiDung::create($data);
        if ($user) {
            Auth::login($user);
            if (Auth::check()) {
                return redirect()->route('get.home');
            }
        }

        return redirect()->back();
    }
}
