<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PC extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'pc_code',
        'pc_name',
        'processor',
        'ram',
        'storage',
        'status',
    ];

    // Relasi ke room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    // Relasi ke borrowing
    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
}