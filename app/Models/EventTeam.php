<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EventTeam extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'team_id',
    ];

    public static function store($request , $id=null){
        $user= $request->only([
            'event_id',
            'team_id',
        ]);
        $date = self::updateOrCreate(['id'=>$id],$user);
        return $date;

    }
    public function teams():HasMany{
        return $this->hasMany(Team::class);
    }
    public function events():HasMany{
        return $this->hasMany(Event::class);
    }
}
