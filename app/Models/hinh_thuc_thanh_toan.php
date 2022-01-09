<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hinh_thuc_thanh_toan extends Model
{
    use HasFactory;
    protected $table = "hinh_thuc_thanh_toan";
    public $timestamps=false; // Tắt/bật chế độ tự động quản lý ‘created_at’ và ‘update_at’
}
