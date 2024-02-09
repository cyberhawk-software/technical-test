<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Turbine;

class TurbineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $turbines = Turbine::all();

        return view('inspections',['turbines' => $turbines]); 
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $turbine = Turbine::find($id);
        
/*         $blades = Turbine::with('blades')->get();
        $hub = Turbine::with('hub')->get();
        $rotor = Turbine::with('rotor')->get();
        $generator = Turbine::with('generator')->get(); */
        $components = $turbine->components;

        $totalGrade=0;
        foreach($components as $component){
            $totalGrade = $totalGrade+$component->grade;
        }
        $avgGrade = round($totalGrade/count($components));
           
           return view('turbinesDetails',
            [
                'turbine' => $turbine,
                'components' => $components,
                'avgGrd' => $avgGrade 
            ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
