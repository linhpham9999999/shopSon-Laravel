<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class binh_luan extends Model
{
    use HasFactory;
    protected $table = "binh_luan";
    const CREATED_AT = 'creation_date';
    public $timestamps=true; // Tắt/bật chế độ tự động quản lý ‘created_at’ và ‘update_at’
}
