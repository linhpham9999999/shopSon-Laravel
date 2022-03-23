<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dia_chi_giao_hang extends Model
{
    use HasFactory;
    protected $table = "dia_chi_giao_hang";
    public $timestamps=false; // Tắt/bật chế độ tự động quản lý ‘created_at’ và ‘update_at’
}
