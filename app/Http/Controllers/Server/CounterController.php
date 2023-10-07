<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Server\Counter;
class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $counter = Counter::get()->first();
        return view('server.counter.index')->with(compact('counter'));
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
        //
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
        $counter = Counter::where('id',$id)->get()->first();
        return view('server.counter.edit')->with(compact('counter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'customers'=>'required',
            'service_guarantee'=>'required',
            'services'=>'required',
            'seevices_completed'=>'required'
            ];
        $this->validate($request,$rules);

        $counter = Counter::findorFail($id);
        $counter->customers = $request->customers;
        $counter->service_guarantee = $request->service_guarantee;
        $counter->services = $request->services;
        $counter->seevices_completed = $request->seevices_completed;
        $counter->update();
        return redirect(route('counter.index'))->with('success','Counter Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
