<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Gebouw;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function gebouwen() {
        return $this->hasMany(Gebouw::class);
    }

    public function isAdministrator() {
        return $this->role == 'admin';
        // return false;
     }

     public function waarde(){
        $gebouwen = $this->gebouwen;
        $waarde = 0;
        foreach($gebouwen as $gebouw) {
            $waarde += $gebouw->prijs;
        }
        $waarde += $this->saldo;
        return $waarde;
     }
}
