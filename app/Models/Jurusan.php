<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jurusan extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'jurusans';

    public function dataJurusan()
    {
        return $this->belongsTo(DataJurusan::class,'id','jurusan_id');
    }
}
