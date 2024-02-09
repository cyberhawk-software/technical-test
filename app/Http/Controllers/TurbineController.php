<?php

namespace App\Http\Controllers;

use App\Models\Turbine;

class TurbineController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $turbines = Turbine::latest()->get();
        return view('list', compact('turbines'));
    }

    public function getTurbine($turbineId)
    {
        $turbine = Turbine::where('id', $turbineId)->first();
        return view('detail', compact('turbine'));
    }
}