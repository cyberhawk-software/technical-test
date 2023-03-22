<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Turbine;
use App\Models\TurbineComponent;
use App\Http\Resources\Turbine as TurbineResource;
   
class TurbineController extends BaseController
{
    public function index()
    {
        $turbines = Turbine::all();
        return $this->sendResponse(TurbineResource::collection($turbines), 'Turbines fetched.');
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'type' => 'required',
            'specification' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $turbine = Turbine::create($input);

        /*$turbineComponentInput = ['turbine_id' =>  $turbine->id, 
                            'component_id' => $input['component_id'], 
                            'grade' => $input['component_id'], 
                            'specification' => $input['component_specification']];
        $turbineComponent = TurbineComponent::create($turbineComponentInput);*/
        return $this->sendResponse(new TurbineResource($turbine), 'Turbine created.');
    }
   
    public function show($id)
    {
        $turbine = Turbine::find($id);
        if (is_null($turbine)) {
            return $this->sendError('Post does not exist.');
        }
        return $this->sendResponse(new TurbineResource($turbine), 'Turbine fetched.');
    }
    
    public function update(Request $request, Turbine $turbine)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'type' => 'required',
            'specification' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $turbine->name = $input['name'];
        $turbine->type = $input['type'];
        $turbine->specification = $input['specification'];
        $turbine->save();
        
        return $this->sendResponse(new TurbineResource($turbine), 'Turbine updated.');
    }
   
    public function destroy(Turbine $turbine)
    {
        $turbine->delete();
        return $this->sendResponse([], 'Turbine deleted.');
    }
}