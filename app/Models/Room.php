<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_name',
        'location',
    ];

    // Relasi ke PC
    public function pcs()
    {
        return $this->hasMany(PC::class);
    }
}