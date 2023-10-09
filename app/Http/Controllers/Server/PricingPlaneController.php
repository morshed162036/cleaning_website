<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Server\PricingPlane;

class PricingPlaneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = PricingPlane::get()->all();
        return view('server.pricing_plan.index')->with(compact('packages'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('server.pricing_plan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules =[
            'title' => 'required',
            'price' => 'required',
        ];
        $this->validate($request,$rules);
        $package = new PricingPlane();
        $package->title = $request->title;
        $package->price = $request->price;
        $package->details = $request->details;
        $package->save();
        return redirect(route('package.index'))->with('success', "seccessfuly create!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $package = PricingPlane::where('id',$id)->first();
        return view('server.pricing_plan.edit',compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $rules =[
            'title' => 'required',
            'price' => 'required',
        ];
        $this->validate($request,$rules);
        $package = PricingPlane::findorFail($id);
         $package->title = $request->title;
        $package->price = $request->price;
        $package->details = $request->details;
        $package->update();
        return redirect(route('package.index'))->with('success', "successfully update");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $package = pricingPlane::findorFail($id);
        $package->delete();
        return redirect(route('package.index'))->with('success', "successfully delete");
    }

    public function packagestatus(Request $request)
    {
        
        if ($request->ajax()) {
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            if ($data['status'] == 'Active') {
                $status = 'Inactive';
            } else {
                $status = 'Active';
            }
            pricingPlane::where('id', $data['banner_id'])->update(['status' => $status]);
            return response()->json(['status' => $status, 'banner_id' => $data['banner_id']]);
        }
    
    }
}
