<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ticket = Ticket::all();
        $ticket = TicketResource::collection($ticket);
        return response()->json(['success'=>true,'data'=>$ticket],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketRequest $request)
    {
        //
        $ticket = Ticket::store($request);
        return response()->json(['success'=>true,'teamdata'=>$ticket],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $ticket = Ticket::find($id);
        $ticket = new TicketResource($ticket);
        return response()->json(['success'=>true,'teamdata'=>$ticket],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TicketRequest $request, string $id)
    {
        //
        $ticket =Ticket::store($request,$id);
        return response()->json(['success'=>true,'teamdata'=>$ticket],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $ticket = Ticket::find($id);
        $ticket->delete();
        return response()->json(['success'=>true,'data'=>"delete successfully"],200);
    }
}
