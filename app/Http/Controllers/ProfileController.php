<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('senac.employee.profile');
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {
        // 
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        // 
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
        //
    }
}
