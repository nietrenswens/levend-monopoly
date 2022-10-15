<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Startcode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'amount'
    ];

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'startcodes_users', 'startcode_id', 'user_id');
    }
}
