<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventTeamRequest;
use App\Http\Resources\EventTeamResource;
use App\Models\EventTeam;
use Illuminate\Http\Request;

class EventTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $teamEvent = EventTeam::all();
        return response()->json(['success'=>true,'data'=>$teamEvent],200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventTeamRequest $request)
    {
        //
        
        $teamEvent = EventTeam::store($request);
        return response()->json(['success'=>true,'data'=>$teamEvent],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $teamEvent = EventTeam::find($id);
        return response()->json(['success'=>true,'data'=>$teamEvent],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventTeamRequest $request, string $id)
    {
        //
        $teamEvent =EventTeam::store($request,$id);
        return response()->json(['success'=>true,'data'=>$teamEvent],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $teamEvent = EventTeam::find($id);
        $teamEvent->delete();
        return response()->json(['success'=>true,'data'=>"delete successfully"],200);
    }
}
