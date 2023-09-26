<?php

namespace App\Http\Controllers;

use App\Models\Measure;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MeasureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('senac.measure.measures');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Measure $measure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Measure $measure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Measure $measure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Measure $measure)
    {
        //
    }
}
