<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('senac.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect('dashboard');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function system()
    {
        $user = auth()->user();

        if ($user->hasRole('administrador')) {
            return redirect()->route('admin.employees.index');
        } else if ($user->hasRole('chefe-de-cozinha')) {
            return redirect()->route('revenues.my-revenues');
        } else if ($user->hasRole('degustador')) {
            return redirect()->route('tasting.revenues-my-tasting');
        } else if ($user->hasRole('editor')) {
            return redirect()->route('cookbooks.my-cookbooks');
        }
    }
}
