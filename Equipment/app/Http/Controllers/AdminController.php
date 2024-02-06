<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Requestment;
use App\Models\EquipmentModel;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function adminhome(){

        $users = User::with(['requestments.equipmentmodel'])->where('role', 'user')->get();

        foreach ($users as $user) {
            $totalPrice = 0; 
            foreach ($user->requestments as $requestment) {
           
                if ($requestment->equipmentmodel) {
                    $totalPrice += $requestment->equipmentmodel->price;
                }
            }

            $user->totalPrice = $totalPrice;
            
        }


        return view('admin.dashboard',compact('users'));
    }

    public function userRequest(string $id){
        $user = User::where('id',$id)->first();
        $requestuser = Requestment::with('equipmentmodel')->where('user_id',$id)->get();
        
        return view('admin.requestByUser',compact('user','requestuser'));
    }

    
}
