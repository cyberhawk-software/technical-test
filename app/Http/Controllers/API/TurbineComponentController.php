<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Turbine;
use App\Models\TurbineComponent;
use App\Http\Resources\TurbineComponent as TurbineComponentResource;
   
class TurbineComponentController extends BaseController
{
    public function index(Request $request)
    {
        $input = $request->all();
        if(isset($input['turbine_id']) && $input['turbine_id'] > 0){
            $turbineComponents = TurbineComponent::where('turbine_id', $input['turbine_id'])->get();
        } else{
            $turbineComponents = TurbineComponent::all();
        }
        
        return $this->sendResponse(TurbineComponentResource::collection($turbineComponents), 'Turbines Components fetched.');
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'turbine_id' => 'required',
            'component_id' => 'required',
            'grade' => 'required',
            'specification' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $turbineComponent = TurbineComponent::create($input);

        return $this->sendResponse(new TurbineComponentResource($turbineComponent), 'Turbine Component created.');
    }
   
    public function show($id)
    {
        $turbineComponent = TurbineComponent::find($id);
        if (is_null($turbineComponent)) {
            return $this->sendError('Post does not exist.');
        }
        return $this->sendResponse(new TurbineComponentResource($turbineComponent), 'Turbine Component fetched.');
    }
    
    public function update(Request $request, TurbineComponent $turbineComponent)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'turbine_id' => 'required',
            'component_id' => 'required',
            'grade' => 'required',
            'specification' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $turbineComponent->turbine_id = $input['turbine_id'];
        $turbineComponent->component_id = $input['component_id'];
        $turbineComponent->grade = $input['grade'];
        $turbineComponent->specification = $input['specification'];
        $turbineComponent->save();
        
        return $this->sendResponse(new TurbineComponentResource($turbineComponent), 'Turbine Component updated.');
    }
   
    public function destroy(TurbineComponent $turbineComponent)
    {
        $turbineComponent->delete();
        return $this->sendResponse([], 'Turbine Component deleted.');
    }
}