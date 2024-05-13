<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Device;
use App\Models\DeviceStatus;
use App\Models\Employee;
use App\Models\Operation;
use App\Models\Province;
use App\Models\Role;
use App\Models\TypeDevice;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    //generate slugs for all models
    public function index(){
        $users = User::all();
        $roles = Role::all();
        $devicestatuses = DeviceStatus::all();
        $devices = Device::all();
        $typedevice = TypeDevice::all();
        $operations = Operation::all();
        $employees = Employee::all();
        $companies = Company::all();
        $provinces = Province::all();

        foreach ($users as $user){
            $user->generateSlug();
            $user->save();
        }

        foreach ($devices as $device){
            $device->generateSlug();
            $device->save();
        }

        foreach ($roles as $role){
            $role->generateSlug();
            $role->save();
        }

        foreach ($devicestatuses as $devicestatus){
            $devicestatus->generateSlug();
            $devicestatus->save();
        }

        foreach ($operations as $operation){
            $operation->generateSlug();
            $operation->save();
        }

        foreach ($employees as $employee){
            $employee->generateSlug();
            $employee->save();
        }

        foreach ($companies as $companmy){
            $companmy->generateSlug();
            $companmy->save();
        }

        foreach ($provinces as $province){
            $province->generateSlug();
            $province->save();
        }

        foreach ($typedevice as $t){
            $t->generateSlug();
            $t->save();
        }


    }
}
