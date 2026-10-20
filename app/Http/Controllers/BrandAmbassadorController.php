<?php

namespace App\Http\Controllers;

use App\Models\BrandAmbassador;

class BrandAmbassadorController extends Controller
{
    public function index()
    {
        $ambassadors = BrandAmbassador::orderBy('urutan')->get();

        return view('brand-ambassador', compact('ambassadors'));
    }
}
