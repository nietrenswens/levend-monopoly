<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Gebouw;
use Illuminate\Support\Facades\DB;
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
        'role',
        'saldo'
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

     public function isGamemaster() {
        return $this->role == 'gamemaster' or $this->role == 'admin';
        // return false;
     }

     public function startcodes() {
         return $this->belongsToMany(Startcode::class, 'startcodes_users', 'user_id', 'startcode_id');
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

     public function getRank() {
        $users = User::where('role', '=', 'gebruiker')->get();
        $users = $users->sortByDesc(function($user) {
            return $user->waarde();
        });
        $rank = 1;
        foreach($users as $user) {
            if($user->id == $this->id) {
                return $rank;
            }
            $rank++;
        }
        return 0;
     }

     public function numBuildings() {
        return $this->gebouwen()->count();
     }

     public function numChancecards() {
        $kanskaarten = DB::table('used_chancecards')->where('user_id', '=', $this->id)->get();
        return $kanskaarten->count();
     }

}
