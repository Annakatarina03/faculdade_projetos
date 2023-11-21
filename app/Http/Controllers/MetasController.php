<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MetasController extends Controller
{
    public function index(): View
    {
        return view('senac.metas');
    }

}
