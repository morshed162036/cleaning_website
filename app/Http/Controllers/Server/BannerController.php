<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Server\Banner;
use Image;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::get()->all();
        return view('server.banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('server.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'first_text'=>'required',
            'second_text'=>'required',
            ];
        $this->validate($request,$rules);

        $banner = new Banner();
        $banner->first_text = $request->first_text;
        $banner->second_text = $request->second_text;

        //dd($request->file('brand_image'));
        //dd($request->hasFile('brand_image'));
        if($request->hasFile('image')){
            $image_temp = $request->file('image');
            if($image_temp->isValid()){
                //Get Image Extension
                $extension = $image_temp->getClientOriginalExtension();
                //Generate New Image Name
                $imageName = time().'.'.$extension;
                $imagePath = 'images/banner/'.$imageName;
                Image::make($image_temp)->resize(1920,600)->save($imagePath);
                $banner->image = $imageName;
            }
        }


        $banner->save();
        return redirect(route('banner.index'))->with('success','New Banner Save Successfully!');
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
        $banner = Banner::where('id',$id)->get()->first();
        return view('server.banner.edit')->with(compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'first_text'=>'required',
            'second_text'=>'required',
            ];
        $this->validate($request,$rules);
        $banner = Banner::findorFail($id);
        $banner->first_text = $request->first_text;
        $banner->second_text = $request->second_text;

        if($request->hasFile('image')){
            $exists = 'images/banner/'.$banner->image;
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
                $imagePath = 'images/banner/'.$imageName;
                Image::make($image_temp)->resize(1920,600)->save($imagePath);
                $banner->image = $imageName;
            }
        }

        $banner->update();

        return redirect(route('banner.index'))->with('success','Banner Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::findorFail($id);
        $exists = 'images/banner/'.$banner->image;
        if(File::exists($exists))
        {
            File::delete($exists);
        }
        $banner->delete();
        $message  = "Banner Delete Successfully Done";
        return redirect(route('banner.index'))->with("success",$message);
    }
    public function updateBannerStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;
            if ($data['status']== 'Active') {
                $status = 'Inactive';
            }
            else{
                $status = 'Active';
            }
            Banner::where('id',$data['banner_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'banner_id'=> $data['banner_id']]);
        }
    }
}
