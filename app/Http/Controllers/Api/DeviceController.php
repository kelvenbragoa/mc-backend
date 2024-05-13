<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeviceRequest;
use App\Models\Device;
use App\Models\DeviceAvailability;
use App\Models\DeviceStatus;
use App\Models\TypeDevice;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $searchQuery = request('query');

        $device = Device::query()
        ->when(request('query'),function($query,$searchQuery){
            $query->where('name','like',"%{$searchQuery}%");
        })
        ->with('devicestatus')
        ->with('typedevice')
        ->with('deviceavailability')
        ->with('employeeholding')
        ->orderBy('name','asc')
        ->paginate(50);
        $deviceAvailability = DeviceAvailability::all();

        return response()->json([
            'device' => $device,
            'deviceAvailability'=> $deviceAvailability
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $devicestatus = DeviceStatus::all();
        $typedevice = TypeDevice::all();
        $deviceavailability = DeviceAvailability::all();

        return response()->json([
            'devicestatus' => $devicestatus,
            'typedevice' => $typedevice,
            'deviceavailability'=>$deviceavailability
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeviceRequest $request)
    {
        //
        $data = $request->all();
        if($request->has('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->file('image')->storeAs('public/images',$imageName);
            $data['image'] = $imageName;
        }
        $device = Device::create($data);

        return response()->json([
            'device' => $device
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Device $device)
    {
        //
        // $device = Device::with('devicestatus')->with('typedevice')->with('deviceavailability')->with('employeeholding.employee')->findOrFail($id);
        $device->load('devicestatus')->load('typedevice')->load('deviceavailability')->load('employeeholding.employee');

        return response()->json([
            'device' => $device
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Device $device)
    {
        //
        // $device = Device::with('employeeholding')->findOrFail($id);
        $device->load('employeeholding')->load('devicestatus')->load('typedevice')->load('deviceavailability');
        $typedevice = TypeDevice::all();
        $devicestatus = DeviceStatus::all();
        $deviceavailability = DeviceAvailability::all();

        return response()->json([
            'device' => $device,
            'typedevice' => $typedevice,
            'devicestatus' => $devicestatus,
            'deviceavailability'=>$deviceavailability
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Device $device)
    {
        //
        $data = $request->all();
        // $device = Device::findOrFail($id);
    
        if($request->has('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->file('image')->storeAs('public/images',$imageName);
            $data['image'] = $imageName;
        }

       

        $device->update($data);

        return response()->json([
            'device' => $device
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $device = Device::findOrFail($id);

        $device->delete();

        return response()->noContent();
    }
}
