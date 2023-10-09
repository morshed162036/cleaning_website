<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use App\Models\Server\About_tab;
use Illuminate\Http\Request;

class AboutTabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about_tabs = About_tab::get()->All();
        return view('server.about_tab.index')->with(compact('about_tabs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('server.about_tab.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $rules=[
            "title" => 'required',
        ];
       $this->validate($request, $rules);
       $about_tab = new About_tab();
       $about_tab->title = $request->title;
       $about_tab->order = $request->order;
       $about_tab->description = $request->description;
       $about_tab->save();
       return redirect(route('about_tab.index'))->with('success', "successfully create about tab!");

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
        $about_tab = About_tab::where('id', $id)->first();
        return view('server.about_tab.edit')->with(compact('about_tab'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules=[
           'title' => 'required',
        ];
        $this->validate($request,$rules);

        $about_tab = About_tab::findorFail($id);
        $about_tab ->title = $request->title;
        $about_tab ->order = $request->order;
        $about_tab ->description = $request->description;
        $about_tab->update();
        return redirect(route('about_tab.index'))->with('success', "successfully update");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $about_tab = About_tab::findOrFail($id);
        $about_tab ->delete();
        return redirect(route('about_tab.index'))->with('success', "successfully delete!");
    }
}
