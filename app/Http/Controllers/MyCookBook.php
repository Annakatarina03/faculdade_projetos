<?php

namespace App\Http\Controllers;

use App\Models\CookBook;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MyCookBook extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('senac.cookbook.my-cookbooks');
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
    public function show(CookBook $cookBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CookBook $cookBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CookBook $cookBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CookBook $cookBook)
    {
        //
    }
}
