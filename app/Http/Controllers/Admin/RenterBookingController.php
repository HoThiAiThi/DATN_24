<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NguoiDungRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RenterBookingController extends Controller
{
    public function index()
    {
        return view('admin.pages.renter.booking');
    }
}