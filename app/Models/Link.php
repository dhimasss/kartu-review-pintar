<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'url_gmb',
        'is_claimed',
        'pin',
    ];

    protected $casts = [
        'is_claimed' => 'boolean',
    ];

    /**
     * Relasi ke scan logs.
     */
    public function scanLogs()
    {
        return $this->hasMany(ScanLog::class);
    }
}
