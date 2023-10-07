<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Server\Service\Service;
use App\Models\Server\Gallery;
use Illuminate\Support\Facades\File;
use Image;
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::with('service')->get()->all();
        return view('server.gallery.index')->with(compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::get()->all();
        return view('server.gallery.create')->with(compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'service_id'=>'required',
            ];
        $this->validate($request,$rules);

        $gallery = new Gallery();
        $gallery->service_id = $request->service_id;
        if($request->hasFile('before')){
            $image_temp = $request->file('before');
            if($image_temp->isValid()){
                //Get Image Extension
                $extension = $image_temp->getClientOriginalExtension();
                //Generate New Image Name
                $imageName = time().'.'.$extension;
                $imagePath = 'images/gallery/'.$imageName;
                Image::make($image_temp)->resize(570,350)->save($imagePath);
                $gallery->before = $imageName;
            }
        }
        if($request->hasFile('after')){
            $image_temp = $request->file('after');
            if($image_temp->isValid()){
                //Get Image Extension
                $extension = $image_temp->getClientOriginalExtension();
                //Generate New Image Name
                $imageName = time().'.'.$extension;
                $imagePath = 'images/gallery/'.$imageName;
                Image::make($image_temp)->resize(570,350)->save($imagePath);
                $gallery->after = $imageName;
            }
        }

        $gallery->save();
        return redirect(route('gallery.index'))->with('success','New Gallery Image Save Successfully!');
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
        $services = Service::get()->all();
        $gallery = Gallery::where('id',$id)->get()->first();
        return view('server.gallery.edit')->with(compact('gallery','services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'service_id'=>'required',
            ];
        $this->validate($request,$rules);

        $gallery = Gallery::findorFail($id);
        $gallery->service_id = $request->service_id;

        if($request->hasFile('before')){
            $exists = 'images/gallery/'.$gallery->before;
            if(File::exists($exists))
            {
                File::delete($exists);
            }
            $image_temp = $request->file('before');
            if($image_temp->isValid()){
                //Get Image Extension
                $extension = $image_temp->getClientOriginalExtension();
                //Generate New Image Name
                $imageName = time().'.'.$extension;
                $imagePath = 'images/gallery/'.$imageName;
                Image::make($image_temp)->resize(570,350)->save($imagePath);
                $gallery->before = $imageName;
            }
        }
        if($request->hasFile('after')){
            $exists = 'images/gallery/'.$gallery->after;
            if(File::exists($exists))
            {
                File::delete($exists);
            }
            $image_temp = $request->file('after');
            if($image_temp->isValid()){
                //Get Image Extension
                $extension = $image_temp->getClientOriginalExtension();
                //Generate New Image Name
                $imageName = time().'.'.$extension;
                $imagePath = 'images/gallery/'.$imageName;
                Image::make($image_temp)->resize(570,350)->save($imagePath);
                $gallery->after = $imageName;
            }
        }

        $gallery->update();

        return redirect(route('gallery.index'))->with('success','Gallery Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::findorFail($id);
        $exists_before = 'images/gallery/'.$gallery->before;
        $exists_after = 'images/gallery/'.$gallery->after;
        if(File::exists($exists_before))
        {
            File::delete($exists_before);
        }
        if(File::exists($exists_after))
        {
            File::delete($exists_after);
        }
        $gallery->delete();
        $message  = "Gallery Delete Successfully Done";
        return redirect(route('gallery.index'))->with("success",$message);
    }
}
