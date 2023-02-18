<?php

namespace App\Models\Sibenih\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdusenAlamat extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'sibenih_mas_produsen_alamat';
}
