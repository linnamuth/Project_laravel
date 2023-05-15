<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'member',
        'gender',
        'user_id',
    ];
    public static function store($request , $id=null){
        $team= $request->only([
            'name',
            'member',
            'gender',
            'user_id'
            
        ]);
        $teams = self::updateOrCreate(['id'=>$id],$team);
        return $teams;

    }
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function events(){
        return $this->belongsToMany(Event::class,'event_teams');
    }

}
