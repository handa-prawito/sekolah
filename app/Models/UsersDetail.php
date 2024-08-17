<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsersDetail extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'users_details';
    protected $guarded = [
        'id'
    ];
}
