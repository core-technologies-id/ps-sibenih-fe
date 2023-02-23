<?php

namespace App\Models\Sibenih;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PohonInduk extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'sibenih_pohon_induk';
}
