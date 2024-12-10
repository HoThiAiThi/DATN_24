<?php

namespace App\Page;

use App\Models\DanhMuc;
use App\Service\RoomService;
use Illuminate\Http\Request;

class PageCategoryService
{
    public static function index($maDM, Request $request)
    {
        $category = DanhMuc::find($maDM);
        $rooms    = RoomService::getListsRoom($request, $params = [
            'danhmuc_maDM' => $maDM
        ]);
        return [
            'category' => $category,
            'rooms'    => $rooms,
            'query'    => $request->query()
        ];
    }
}