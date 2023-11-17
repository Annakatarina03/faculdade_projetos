<?php

namespace App\Http\Controllers;

use App\Models\CookBookRecipe;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MyPublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('senac.publication.my-publication');
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
    public function show(CookBookRecipe $cookBookRecipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CookBookRecipe $cookBookRecipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CookBookRecipe $cookBookRecipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CookBookRecipe $cookBookRecipe)
    {
        //
    }
}
