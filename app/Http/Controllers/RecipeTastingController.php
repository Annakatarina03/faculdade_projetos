<?php

namespace App\Http\Controllers;

use App\Models\RecipeTasting;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RecipeTastingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('senac.recipe-tasting.schedule-tasting');
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
    public function show(RecipeTasting $recipeTasting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RecipeTasting $recipeTasting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RecipeTasting $recipeTasting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RecipeTasting $recipeTasting)
    {
        //
    }
}