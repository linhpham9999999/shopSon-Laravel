<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mau_san_pham extends Model
{
    use HasFactory;
    protected $table = "mau_san_pham";
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';
    public $timestamps=true; // Tắt/bật chế độ tự động quản lý ‘created_at’ và ‘update_at’
}
