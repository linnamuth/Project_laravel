<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dateStart',
        'dateEnd',
        'location',
        'user_id',
    ];

    public static function store($request , $id=null){
        $event= $request->only([
            'name',
            'date',
            'dateStart',
            'dateEnd',
            'location',
            'user_id',
        ]);
        $events = self::updateOrCreate(['id'=>$id],$event);
        $teams = request('teams');
        $events->teams()->sync($teams);
        return $events;

    }
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
    
    public function teams(){
        return $this->belongsToMany(Team::class,'event_teams');
    }
    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
