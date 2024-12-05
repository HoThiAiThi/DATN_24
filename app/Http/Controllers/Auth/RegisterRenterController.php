<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\NguoiDung;
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
}
