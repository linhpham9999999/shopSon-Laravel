<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class trang_thai extends Authenticatable
{
    use HasFactory;
    protected $table = "trang_thai";
    public $timestamps=false;
}
