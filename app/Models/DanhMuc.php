<?php

namespace App\Models;

use App\Models\Phong;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Summary of DanhMuc
 */
class DanhMuc extends Model
{
    use HasFactory;
    protected $table = 'danhmuc';
    protected $guarded = [''];
    protected $primaryKey = 'maDM';

    /**
     * Summary of room
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function room()
    {
        return $this->hasMany(Phong::class);
    }
    const CREATED_AT = 'ngaytao'; 
    const UPDATED_AT = 'ngaycapnhat'; 
}