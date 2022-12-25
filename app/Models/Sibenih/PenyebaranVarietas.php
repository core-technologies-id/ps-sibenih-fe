<?php

namespace App\Models\Sibenih;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class PenyebaranVarietas extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];
    protected $table = 'sibenih_penyebaran_varietas';
}
