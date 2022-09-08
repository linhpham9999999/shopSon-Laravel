<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class quan_tri extends Authenticatable
{
    use HasFactory;
    protected $table = "quan_tri";
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';
    public $timestamps=true;
}
