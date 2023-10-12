<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Server\Order;
use App\Models\Server\Service\Service;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::where('status', 'Empty')->get()->all();
        $orders = Order::get()->all();
        return view('server.order.index')->with(compact('orders', 'services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::where('status', 'Empty')->get()->all();
        return view('server.order.create')->with(compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'service_id' => 'required',
            'name' => 'required',
            'address' => 'required',
            'description' => 'required',
            'date' => 'required',
        ];
        $this->validate($request, $rules);
        $order = new Order();
        $order->service_id = $request->service_id;
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->remarks = $request->remarks;
        $order->date = $request->date;
        $order->start_time = $request->start_time;
        $order->end_time = $request->end_time;
        $order->description = $request->description;
        $order->save();
        return redirect(route('order.index'))->with('success', 'Seccessfully update!');
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
        $services = Service::where('status', 'Empty')->get()->all();
        $order = Order::firstorFail();
        return view('server.order.edit')->with(compact('order', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'service_id' => 'required',
            'name' => 'required',
            'address' => 'required',
            'description' => 'required',
            'date' => 'required',
        ];
        $order = Order::findorFail($id);
        $order->service_id = $request->service_id;
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->remarks = $request->remarks;
        $order->date = $request->date;
        $order->start_time = $request->start_time;
        $order->end_time = $request->end_time;
        $order->description = $request->description;
        $order->update();
        return redirect(route('order.index'))->with('success', 'Successfuly update');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findorFail($id);
        $order->delete();
        return redirect(route('order.index'))->with('success', 'Successfuly delete');


    }
}
