<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ChuTro;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Collection;
use Illuminate\Support\Facades\Log;

class RegisterLandlordController extends Controller
{
    public function index()
    {
        return view('auth.register_landlord');
    }

    public function ChuTro(Request $request)
    {
        $user = session('user');
        Log::info('Chủ trọ:', ['data' => $user?->id]);
        $data =  $request->except('_token');
        $data['maTK'] = $user?->id;
        Log::info('Chủ trọ:', ['data' => $data]);
        $chutro = ChuTro::create($data);
        if ($chutro ) {
            Auth::login($user);
            if (Auth::check()) {
                session()->forget('user');
                return redirect()->route('get.home');
            }
        }

        return redirect()->back();
    }
}
