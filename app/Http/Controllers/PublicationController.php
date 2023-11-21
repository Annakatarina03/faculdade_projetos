<?php

namespace App\Http\Controllers;

use App\Models\CookBook;
use App\Models\CookBookRecipe;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('senac.publication.all-publications');
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
    public function show(int $id)
    {
        $cookbook = CookBook::find($id);
        $revenues = $cookbook->revenues()->get();
        $pdf = pdf::loadView(
            'senac.publication.publication-pdf',
            ['cookbook' => $cookbook, 'revenues' => $revenues]
        );


        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
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
