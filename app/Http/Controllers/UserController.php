<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\UserPostResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserShowResorce;
use App\Http\Resources\UserShowResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = User::all();
        $user = UserResource::collection($user);
        return response()->json(['success'=>true,'data'=>$user],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        //
        $user = User::store($request);
        return response()->json(['success'=>true,'data'=>$user],200);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $user = User::find($id);
        $user = new UserShowResource($user);
        return response()->json(['success'=>true,'data'=>$user],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserStoreRequest $request, string $id)
    {
        //
        $user =User::store($request,$id);
        return response()->json(['success'=>true,'data'=>$user],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $user = User::find($id);
        $user->delete();
        return response()->json(['success'=>true,'data'=>"delete successfully"],200);
    }
}







