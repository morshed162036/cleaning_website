<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Server\About_company;
class AboutCompanyController extends Controller 
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About_company::get()->first();
        return view('server.about_company.index')->with(compact('about'));
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
        $about = About_company::get()->first();
        return view('server.about_company.edit')->with(compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'title'=>'required',
            'pera_1'=>'required',
            'our_mission'=>'required',
            'our_vision'=>'required',
            ];
        $this->validate($request,$rules);

        $about = About_company::findorFail($id);
        $about->title = $request->title;
        $about->pera_1 = $request->pera_1;
        $about->pera_2 = $request->pera_2;
        $about->our_mission = $request->our_mission;
        $about->our_vision = $request->our_vision;
        $about->save();
        return redirect(route('about-company.index'))->with('success','About Company Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
