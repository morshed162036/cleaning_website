<?php

namespace App\Http\Controllers\Server\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;
use App\Models\Server\Service\Service;
use App\Models\Server\Service\Service_detail;
class ServiceDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = Service_detail::with('service')->get()->all();
        return view('server.service.details.index',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::where('status','Empty')->get()->all();
        return view('server.service.details.create')->with(compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'service_id'=>'required',
            'description'=>'required',
            'our_plan'=>'required'
            ];
        $this->validate($request,$rules);

        $detail = new Service_detail();
        $detail->service_id = $request->service_id;
        $detail->description = $request->description;
        $detail->our_plan = $request->our_plan;
        if($request->hasFile('image')){
            $image_temp = $request->file('image');
            if($image_temp->isValid()){
                //Get Image Extension
                $extension = $image_temp->getClientOriginalExtension();
                //Generate New Image Name
                $imageName = time().'.'.$extension;
                $imagePath = 'images/service/'.$imageName;
                Image::make($image_temp)->resize(1920,1080)->save($imagePath);
                $detail->image = $imageName;
            }
        }
        $service = Service::findorFail($request->service_id);
        $service->status = 'Attach';
        $service->update();
        
        $detail->save();
        return redirect(route('service-detail.index'))->with('success','New Service-details Save Successfully!');
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
        $services = Service::where('status','Empty')->get()->all();
        $detail = Service_detail::with('service')->where('id',$id)->get()->first();
        return view('server.service.details.edit')->with(compact('detail','services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'description'=>'required',
            'our_plan'=>'required'
            ];
        $this->validate($request,$rules);

        $detail = Service_detail::findorFail($id);
        if($request->service_id){
             
            Service::where('id',$detail->service_id)->update(['status'=>'Empty']);
            Service::where('id',$request->service_id)->update(['status'=>'Attach']);
            $detail->service_id = $request->service_id;
        }
       
        $detail->description = $request->description;
        $detail->our_plan = $request->our_plan;
        
        if($request->hasFile('image')){
            $exists = 'images/service/'.$detail->image;
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
                Image::make($image_temp)->resize(1920,1080)->save($imagePath);
                $detail->image = $imageName;
            }
        }

        
        $detail->update();
        return redirect(route('service-detail.index'))->with('success','Service Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detail = Service_detail::with('service')->findorFail($id);
        $exists = 'images/service/'.$detail->image;
        if(File::exists($exists))
        {
            File::delete($exists);
        }
        $service = Service::findorFail($detail->service->id);
        $service->status = 'Empty';
        $service->update();

        $detail->delete();
        return redirect(route('service-detail.index'))->with('success','Service Details Delete Successfully!');
    }
}
