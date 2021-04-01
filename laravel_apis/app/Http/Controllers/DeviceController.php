<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// import modals
use App\Models\Device;

// validator class
use Validator;

class DeviceController extends Controller
{
    //
    function list($id=null)
    {
        return $id?Device::find($id):Device::all();
    }

    function update(Request $req){
        $device = Device::find($req->id);
        $device->name = $req->name;
        $device->feature = $req->feature;
        $device->price = $req->price;
        $result = $device->save();
        if($result){
            return ["Result"=>"Data Saved"];

        }else{
        return ["Result"=>"Data is not saved"];

        }
    }


    function search($name)
    {
        return Device::where("name","like","%".$name."%")->get();
    }


    function delete($id){

        if(Device::where("id",$id)->delete()){
            return "deleted";

        }else{
            return "not deleted";
        }
    }

    function save(Request $req){
        $rules = array(
            "price"=>"required|min:2|max:4"
        );
        $validator = Validator::make($req->all(), $rules);

        if($validator -> fails()){
            return response()->json($validator->errors(),401);
        }else{
            // return ["Result"=>"validated"];
            $device = new Device;
            $device->name = $req->name;
            $device->feature = $req->feature;
            $device->price = $req->price;
            $result = $device->save();
            if($result){
                return ["Result"=>"Result has been saved"];
            }
            else{
                return ["Result"=>"Result has not been saved"];

            }
            
        }
    }
}
