<?php

namespace App\Models\Sibenih\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'sisaras_kecamatan';
    protected $primaryKey = 'idkecamatan';

    public const STATUS_DELETED = 0;
    public const STATUS_ACTIVE = 1;

    public const PUBLISHED_ACTIVE = 1;
    public const PUBLISHED_INACTIVE = 0;

    protected $casts = [
        'created_at' => 'datetime',
    ];

    protected $fillable = [
        'idkabupaten',
        'kecamatan',
    ];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'idkabupaten', 'idkabupaten');
    }
}
