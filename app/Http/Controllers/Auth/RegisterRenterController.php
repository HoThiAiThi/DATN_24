<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\NguoiThue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Collection;

class RegisterRenterController extends Controller
{
    public function index()
    {
        return view('auth.register_renter');
    }
    public function NguoiThue(Request $request)
    {
        $user = session('user');

        $data =  $request->except('_token');
        $data['maTK'] = $user?->id;
        $data['anhdaidien'] = null;
        $nguoithue = NguoiThue::create($data);
        if ($nguoithue ) {
            Auth::login($user);
            if (Auth::check()) {
                session()->forget('user');
                return redirect()->route('get.home');
            }
        }

        return redirect()->back();
    }
}
