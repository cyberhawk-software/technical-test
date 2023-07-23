<?php

namespace App\Http\Controllers;

use App\Models\location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $location = (new location())->getDashboard();
        $data = ['table' => $location];
        return view('pages.dashboard', $data);
    }


}