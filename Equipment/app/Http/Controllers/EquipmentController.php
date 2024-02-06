<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EquipmentModel;
class EquipmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $listmodel = EquipmentModel::get();
        return view('admin.listmodel',compact('listmodel'));
    }

    public function createmodel(){
        return view('admin.createmodel');
    }

    public function insertmodel(Request $request){
    
        $request->validate([
            'equipment' => 'required'
        ]);
        if($request->equipment == 'mouse'){
            $request->validate([
                'mouse.*.model' => 'required',
                'mouse.*.price' => 'required'
            ],[
                'mouse.*.model' => 'Model is required',
                'mouse.*.price' => 'Price is required',
                'mouse.*.price' => 'Price must be a number',
            ]);
            
            foreach($request->mouse as $key=>$value){
                $exists = EquipmentModel::where('equipment', $request->equipment)
                                        ->where('model', $value['model'])
                                        ->exists();
                if ($exists) {
                    return back()->withErrors(['mouse.'.$key.'.model' => 'mouse has already.']);
                }
                EquipmentModel::create([
                    'equipment' => $request->equipment,
                    'model' => $value['model'],
                    'price' => $value['price'],
                ]);
            }

        }
        elseif($request->equipment == 'moniter'){
            $request->validate([
                'moniter.*.model' => 'required',
                'moniter.*.price' => 'required'
            ],[
                'moniter.*.model' => 'Model is required',
                'moniter.*.price' => 'Price is required',
                'moniter.*.price' => 'Price must be a number',
            ]);
            
            foreach($request->moniter as $key=>$value){
                $exists = EquipmentModel::where('equipment', $request->equipment)
                                        ->where('model', $value['model'])
                                        ->exists();
                if ($exists) {
                    return back()->withErrors(['moniter.'.$key.'.model' => 'moniter has already.']);
                }
                EquipmentModel::create([
                    'equipment' => $request->equipment,
                    'model' => $value['model'],
                    'price' => $value['price'],
                ]);
            }
        }
        elseif($request->equipment == 'keyboard'){
            $request->validate([
                'keyboard.*.model' => 'required',
                'keyboard.*.price' => 'required'
            ],[
                'keyboard.*.model' => 'Model is required',
                'keyboard.*.price' => 'Price is required',
                'keyboard.*.price' => 'Price must be a number',
            ]);
            
            foreach($request->keyboard as $key=>$value){
                $exists = EquipmentModel::where('equipment', $request->equipment)
                                        ->where('model', $value['model'])
                                        ->exists();
                if ($exists) {
                    return back()->withErrors(['keyboard.'.$key.'.model' => 'keyboard has already.']);
                }
                EquipmentModel::create([
                    'equipment' => $request->equipment,
                    'model' => $value['model'],
                    'price' => $value['price'],
                ]);
            }
        }

        return redirect()->route('managemodel')->with('success','Create model success');
    }

    public function editmodel(string $id){
        $equipment = EquipmentModel::findOrFail($id);
        return view('admin.editmodel',compact('equipment'));
    }

    public function updateModel(Request $request, string $id){
        $request->validate([
            'equipment' => 'required',
            'model' => 'required',
            'price' => 'required|numeric'
        ]);
        
        $updatedata = EquipmentModel::findOrFail($id);
        $updatedata->update([
            'model' => $request->model,
            'price' => $request->price
        ]);
        return redirect()->route('managemodel')->with('success','edit model success');
    }

    public function deletemodel(string $id){
        $deletemodel = EquipmentModel::findOrFail($id);
        $deletemodel->delete();
        return redirect()->route('managemodel')->with('success','delete model success');
    }
}
