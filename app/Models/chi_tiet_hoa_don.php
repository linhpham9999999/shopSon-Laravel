<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chi_tiet_hoa_don extends Model
{
    use HasFactory;
    protected $table = "chi_tiet_hoa_don";
    public $timestamps=false; // Tắt/bật chế độ tự động quản lý ‘created_at’ và ‘update_at’
}
