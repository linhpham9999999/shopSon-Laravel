<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class yeu_thich extends Model
{
    use HasFactory;
    protected $table = "yeu_thich";
    public $timestamps=false; // Tắt/bật chế độ tự động quản lý ‘created_at’ và ‘update_at’
}
