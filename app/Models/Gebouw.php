<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gebouw extends Model
{
    use HasFactory;

    protected $table = 'gebouwen';

    protected $fillable = [
        'naam',
        'prijs',
        'uuid',
        'user_id',
        'belasting',
    ];

    protected $casts = [
        'belasting' => 'boolean'
    ];

    public function getRouteKeyName() {
        return 'uuid';
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
