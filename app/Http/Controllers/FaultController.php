<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Fault;
use App\Category;
use App\Vehicle;
use Image;

class FaultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        
        $vehicles=Vehicle::orderBy('created_at','asc')->get();
        $categories=Category::orderBy('name','asc')->get();
        $faults=Fault::orderBy('created_at','desc')->get();
        return view('admin.fault.index',compact('faults','vehicles','categories','user'));
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
        $formInput=$request->except('imagename');
        $this->validate($request, [
            'category_id' => 'required',
            'vehicle_id' => 'required',
            'problem' => 'required',
            'cause' => 'required',
            'solution' => 'required',
            'imagename'=>'required|image|mimes:png,jpg,jpeg|max:10000',
        ]);

        if ($request->hasFile('imagename')) {
            $image=$request->file('imagename');
            $imageName=time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(600,600)->save(public_path('vehicleparts_images/'.$imageName));

            $formInput['imagename']=$imageName;
        }

        $fault=new Fault;
        $fault->category_id=$request->category_id;
        $fault->vehicle_id=$request->vehicle_id;
        $fault->user_id=$request->user_id;
        $fault->problem=$request->problem;
        $fault->cause=$request->cause;
        $fault->solution=$request->solution;
        $fault->imagename=$formInput['imagename'];

        $fault->save();

        return redirect()->route('faults.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicles=Vehicle::orderBy('created_at','asc')->get();
        $categories=Category::orderBy('name','asc')->get();
        $fault=Fault::find($id);
        return view('admin.fault.show',array('user'=>Auth::user()),compact('fault','vehicles','categories'));
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
        
        $vehicles=Vehicle::orderBy('created_at','desc')->get();
        $categories=Category::orderBy('name','asc')->get();
        $faults=Fault::where('id',$id)->first();
        return view('admin.fault.edit',compact('faults','vehicles','categories','user'));
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
            'category_id' => 'required',
            'vehicle_id' => 'required',
            'problem' => 'required',
            'cause' => 'required',
            'solution' => 'required',
        ]);

        $fault = Fault::find($id);
        $fault->category_id = $request->category_id;
        $fault->vehicle_id = $request->vehicle_id;
        $fault->user_id = $request->user_id;
        $fault->problem = $request->problem;
        $fault->cause = $request->cause;
        $fault->solution = $request->solution;
        

        $fault->save();

        return redirect(route('faults.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faults = Fault::where('id', $id)->delete();
        return redirect()->back();
    }
}
