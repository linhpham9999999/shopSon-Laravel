<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class nguoi_dung extends Authenticatable
{
    use HasFactory;
//    const UPDATED_AT = null;
    protected $table = "nguoi_dung";
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';
    public $timestamps=true; // Tắt/bật chế độ tự động quản lý ‘created_at’ và ‘update_at’
}
