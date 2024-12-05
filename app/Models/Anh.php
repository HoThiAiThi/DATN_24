<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anh extends Model
{
    use HasFactory;

    protected $table = 'hinhanh_ct';
    protected $guarded = [''];
    const CREATED_AT = 'ngaytao'; 
    const UPDATED_AT = 'ngaycapnhat';
}
