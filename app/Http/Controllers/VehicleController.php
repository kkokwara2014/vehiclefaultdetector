<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Vehicle;
use App\Make;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        
        $vehicles=Vehicle::orderBy('created_at','desc')->get();
        $makes=Make::orderBy('name','asc')->get();
        return view('admin.vehicle.index',compact('vehicles','makes','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'make_id' => 'required',
            'serialnum' => 'required',
            'model' => 'required',
            'engine' => 'required',
            'drivetraincount' => 'required',
            'doorcount' => 'required',
            'cylindernum' => 'required',
        ]);

        Vehicle::create($request->all());

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();

        $vehicles = Vehicle::where('id', $id)->first();;
        $makes=Make::orderBy('name','asc')->get();
        return view('admin.vehicle.edit',compact('vehicles','makes','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'make_id' => 'required',
            'serialnum' => 'required',
            'model' => 'required',
            'engine' => 'required',
            'drivetraincount' => 'required',
            'doorcount' => 'required',
            'cylindernum' => 'required',
        ]);

        $vehicle = Vehicle::find($id);
        $vehicle->make_id = $request->make_id;
        $vehicle->serialnum = $request->serialnum;
        $vehicle->model = $request->model;
        $vehicle->engine = $request->engine;
        $vehicle->drivetraincount = $request->drivetraincount;
        $vehicle->doorcount = $request->doorcount;
        $vehicle->cylindernum = $request->cylindernum;

        $vehicle->save();

        return redirect(route('vehicles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicles = Vehicle::where('id', $id)->delete();
        return redirect()->back();
    }
}
