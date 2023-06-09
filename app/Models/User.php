<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
        'age',
        'gender',
        'phone_number',
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

    public static function store($request , $id=null){
        $user= $request->only([
            'name',
            'age',
            'gender',
            'phone_number',
        ]);
        $date = self::updateOrCreate(['id'=>$id],$user);
        return $date;

    }
    public function events():HasMany{
        return $this->hasMany(Event::class);
    }
    public function teams():HasMany{
        return $this->hasMany(Team::class);
    }
    
    public function tickets():HasMany{
        return $this->hasMany(Ticket::class);
    }
}