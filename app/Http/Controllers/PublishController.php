<?php

namespace App\Http\Controllers;

use App\Models\CookBook;
use App\Models\CookBookRecipe;
use App\Models\Revenue;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PublishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('senac.publication.publish-index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $id, Request $request): View
    {
        $cookbook = CookBook::find($id);

        /**
         * @var \Illuminate\Pagination\LengthAwarePaginator $revenues
         */

        $revenues = Revenue::paginate(5)
            ->onEachSide(0);

        return view('senac.publication.publish-create', compact(['cookbook', 'revenues']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        /**
         * @var array $revenues
         */

        $revenues = $request->session()->get('publish_revenues');

        if (empty($revenues)) {
            return redirect()
                ->route('publications.publish.cookbooks-create', $request->cookbook)
                ->withErrors(['publish_revenues' => 'É necessário publicar uma receita']);
        }

        /**
         * @var CookBook $cookbook
         */

        $cookbook = CookBook::find($request->cookbook);

        $cookbook->revenues()->attach($revenues);
        $request->session()->remove('publish_revenues');

        return redirect()
            ->route('publications.my-publications.cookbooks')
            ->with('success', 'Publicação realizada com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): View
    {
        /**
         * @var CookBook $cookbook
         */
        $cookbook = CookBook::find($id);
        $revenues =  $cookbook->revenues()->get()->pluck('id');

        /**
         * @var \Illuminate\Pagination\LengthAwarePaginator $revenues
         */

        $revenues_paginate = Revenue::paginate(5)
            ->onEachSide(0);

        return view('senac.publication.publish-view', compact(['cookbook', 'revenues']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id, Request $request)
    {
        /**
         * @var CookBook $cookbook
         */
        $cookbook = CookBook::find($id);
        $revenues =  $cookbook->revenues()->get()->pluck('id');

        /**
         * @var \Illuminate\Pagination\LengthAwarePaginator $revenues
         */

        $revenues_paginate = Revenue::paginate(5)
            ->onEachSide(0);

        return view('senac.publication.publish-edit', compact(['cookbook', 'revenues']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        /**
         * @var array $revenues
         */

        $revenues = array_unique(
            array_merge(
                (array) $request->session()->get('publish_revenues', []),
                (array) $request->publish_revenues
            )
        );

        if (empty($revenues)) {
            return redirect()
                ->back()
                ->withErrors(['publish_revenues' => 'É necessário publicar uma receita']);
        }

        /**
         * @var CookBook $cookbook
         */

        $cookbook = CookBook::find($request->cookbook);
        $cookbook->revenues()->sync($revenues);
        $request->session()->remove('publish_revenues');

        return redirect()
            ->route('publications.my-publications.cookbooks')
            ->with('success', 'Publicação atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CookBookRecipe $cookBookRecipe)
    {
        //
    }
}
