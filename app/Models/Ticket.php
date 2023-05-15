<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'timeStart',
        'timeEnd',
        'user_id',
        'event_id',
        
    ];
    public static function store($request , $id=null){
        $ticket= $request->only([
            'timeStart',
            'timeEnd',
            'user_id',
            'event_id',
           
            
        ]);
        $data = self::updateOrCreate(['id'=>$id],$ticket);
        return $data;

    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function event(){
        return $this->belongsTo(Event::class);
    }
    
}
