<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loai_san_pham extends Model
{
    use HasFactory;
    protected $table = "loai_san_pham";
    public $timestamps=false; // Tắt/bật chế độ tự động quản lý ‘created_at’ và ‘update_at’
}
