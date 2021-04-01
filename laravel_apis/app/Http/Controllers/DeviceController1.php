<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


// use Device model
use App\Models\Device;

class DeviceController1 extends Controller
{
    //
    function add(Request $req)
    {
        $device = new Device;
        $device -> name =$req->name;
        $device -> feature =$req->feature;
        $device -> price =$req->price;
        $result=$device->save();
        if($result){
            return ["Result"=>"Data has been saved"];

        }else{
        return ["Result"=>"Data has not been saved"];

        }
    }
}
