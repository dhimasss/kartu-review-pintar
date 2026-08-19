<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScanLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'link_id',
        'ip_address',
        'user_agent',
    ];

    /**
     * Relasi ke link.
     */
    public function link()
    {
        return $this->belongsTo(Link::class);
    }
}
