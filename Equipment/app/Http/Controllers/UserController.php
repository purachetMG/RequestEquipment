<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Requestment;
use App\Models\EquipmentModel;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user');
    }
    public function index(){
        $dataRequest = Requestment::where('user_id',auth()->user()->id)->get();
        
        return view('user.dashboard',compact('dataRequest'));
    }
    public function requestform(){
        $listmouse = EquipmentModel::where('equipment','mouse')->get();
        $listmoniter = EquipmentModel::where('equipment','moniter')->get();
        $listkeyboard = EquipmentModel::where('equipment','keyboard')->get();
        return view('user.requestment',compact('listmouse','listmoniter','listkeyboard'));
    }
    public function sendform(Request $request){
        
        $request->validate([
            'equipment' => 'required'
        ]);

        if($request->equipment == 'mouse' or $request->equipment == 'keyboard'){
            
            $CKmouseAkeyboard = Requestment::where('user_id',auth()->user()->id)
                                            ->where('equipment',$request->equipment)
                                            ->count();
            if($CKmouseAkeyboard > 0){
                return back()->withErrors(['equipment'=>'you can request mouse or keyboard this one']);
            }

            if($request->equipment == 'mouse'){
            $request->validate([
                'mousemodel' => 'required',
            ]);
            Requestment::create([
                'user_id' => auth()->user()->id,
                'equipment' => $request->equipment,
                'model' => $request->mousemodel,
            ]);
            }
            if($request->equipment == 'keyboard'){
            $request->validate([
                'keyboardmodel' => 'required',
            ]);
            Requestment::create([
                'user_id' => auth()->user()->id,
                'equipment' => $request->equipment,
                'model' => $request->keyboardmodel,
            ]);
            }
            
        }

        if($request->equipment == 'moniter'){
        $request->validate([
            'moniter.*.model' => 'required',
        ],[
            'moniter.*.model' => 'Model is required',
        ]);
        
        foreach($request->moniter as $key=>$value){
            $stringValue = implode(', ', $value);
            Requestment::create([
                'user_id' => auth()->user()->id,
                'equipment' => $request->equipment,
                'model' => $stringValue,
            ]);
        }
        }
        return redirect()->route('home')->with('success','Create request success');
    }

    public function editRequest(string $id){
        $datarequest = Requestment::findOrFail($id);
        return view('user.editRequest',compact('datarequest'));
    }

    public function updateRequest(Request $request,string $id){
        $request->validate([
            'equipment' => 'required',
            'model' => 'required'
        ]);
        
        $updatedata = Requestment::findOrFail($id);
        $updatedata->update([
            'model' => $request->model
        ]);
        
        return redirect()->route('home')->with('success','Update request success');
    }

    public function deleteRequest(string $id){
        $deleteRequest = Requestment::findOrFail($id);
        $deleteRequest->delete();
        return redirect()->route('home')->with('success','Delete request success');
    }

}
