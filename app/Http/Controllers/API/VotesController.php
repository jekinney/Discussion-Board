<?php

namespace App\Http\Controllers\API;

use App\Site\Models\Vote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VotesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Vote $vote)
    {
        $vote->handle($request);
        return response()->json($vote->counts($request), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Vote $vote)
    {
        return response()->json($vote->counts($request), 200);
    }

}
