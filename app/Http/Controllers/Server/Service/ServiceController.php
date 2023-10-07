<?php

namespace App\Http\Controllers\Server\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Server\Service\Service;
use Image;
use Illuminate\Support\Facades\File;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::get()->all();
        return view('server.service.type.index')->with(compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('server.service.type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title'=>'required',
            ];
        $this->validate($request,$rules);

        $service = new Service();
        $service->title = $request->title;
        
        if($request->hasFile('image')){
            $image_temp = $request->file('image');
            if($image_temp->isValid()){
                //Get Image Extension
                $extension = $image_temp->getClientOriginalExtension();
                //Generate New Image Name
                $imageName = time().'.'.$extension;
                $imagePath = 'images/service/'.$imageName;
                Image::make($image_temp)->resize(370,300)->save($imagePath);
                $service->image = $imageName;
            }
        }

        
        $service->save();
        return redirect(route('service.index'))->with('success','New Service Save Successfully!');
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
        $service = Service::where('id',$id)->get()->first();
        return view('server.service.type.edit')->with(compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'title'=>'required',
            ];
        $this->validate($request,$rules);

        $service = Service::findorFail($id);
        $service->title = $request->title;
        
        if($request->hasFile('image')){
            $exists = 'images/service/'.$service->image;
            if(File::exists($exists))
            {
                File::delete($exists);
            }
            $image_temp = $request->file('image');
            if($image_temp->isValid()){
                //Get Image Extension
                $extension = $image_temp->getClientOriginalExtension();
                //Generate New Image Name
                $imageName = time().'.'.$extension;
                $imagePath = 'images/service/'.$imageName;
                Image::make($image_temp)->resize(370,300)->save($imagePath);
                $service->image = $imageName;
            }
        }

        
        $service->update();
        return redirect(route('service.index'))->with('success','Service Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findorFail($id);
        $exists = 'images/service/'.$service->image;
        if(File::exists($exists))
        {
            File::delete($exists);
        }
        $service->delete();
        return redirect(route('service.index'))->with('success','Service Delete Successfully!');
    }
}
