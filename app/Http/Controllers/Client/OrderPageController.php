<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Server\Service\Service;
use App\Models\Server\PricingPlane;
use App\Models\Server\Order;
class OrderPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::get()->all();
        $plans = PricingPlane::get()->all();
        return view('client.order-page')->with(compact('services','plans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'description' => 'required',
            'service_id' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ];
        $this->validate($request,$rules);
        $order = new Order();
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->description = $request->description;
        $order->service_id = $request->service_id;
        $order->plan_id = $request->plan_id;
        $order->date = $request->date;
        $order->start_time = $request->start_time;
        $order->end_time = $request->end_time;
        $order->save();
        return redirect()->back()->with('success','New order Save Successfully!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
