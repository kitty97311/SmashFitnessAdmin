<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApp extends Model
{
    use HasFactory;
    protected $table = "app_user";
   protected $primaryKey = "id";
}
