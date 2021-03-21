<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// import modals
use App\Models\Device;

class DeviceController extends Controller
{
    //
    function list()
    {
        return Device::all();
    }
}