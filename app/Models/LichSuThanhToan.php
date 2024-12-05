<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichSuThanhToan extends Model
{
    use HasFactory;
    const STATUS_SUCCESS = 2;

    protected $guarded = [''];
    protected $table = 'lichsu_thanhtoan';

    const CREATED_AT = 'ngaytao'; 
    const UPDATED_AT = 'ngaycapnhat'; 

    public function user()
    {
        return $this->belongsTo(NguoiDung::class, 'nguoidung_id');
    }
}
