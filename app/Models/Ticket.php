<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'date',
        'price',
        'zone'
    ];
    public static function store($request , $id=null){
        $ticket= $request->only([
            'user_id',
            'event_id',
            'date',
            'price',
            'zone'
            
        ]);
        $data = self::updateOrCreate(['id'=>$id],$ticket);
        return $data;

    }

    public function user(){
        return $this->belongsTo(Ticket::class);
    }

    public function events(){
        return $this->belongsTo(Event::class);
    }
    
}
