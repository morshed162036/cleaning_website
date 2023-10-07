<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Server\Company_detail;
use Illuminate\Support\Facades\File;
use Image;
class CompanyDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detail = Company_detail::get()->first();
        return view('server.settings.basic.index')->with(compact('detail'));
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
        $company = Company_detail::get()->first();
        return view('server.settings.basic.edit')->with(compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $rules = [
            'name'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'operation_hour_1'=>'required',
            ];
        $this->validate($request,$rules);

        $company = Company_detail::findorFail($id);
        $company->name = $request->name;
        $company->address = $request->address;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->fax = $request->fax;
        $company->operation_hour_1 = $request->operation_hour_1;
        $company->operation_hour_2 = $request->operation_hour_2;
        $company->facebook = $request->facebook;
        $company->twitter = $request->twitter;
        $company->instagram = $request->instagram;
        $company->google_location = $request->google_location;
        
        if($request->hasFile('logo')){
            $exists = 'images/logo/'.$company->logo;
            if(File::exists($exists))
            {
                File::delete($exists);
            }
            $image_temp = $request->file('logo');
            if($image_temp->isValid()){
                //Get Image Extension
                $extension = $image_temp->getClientOriginalExtension();
                //Generate New Image Name
                $imageName = time().'.'.$extension;
                $imagePath = 'images/logo/'.$imageName;
                Image::make($image_temp)->resize(600,600)->save($imagePath);
                $company->logo = $imageName;
            }
        }
        if($request->hasFile('favicon')){
            $exists = 'images/logo/'.$company->favicon;
            if(File::exists($exists))
            {
                File::delete($exists);
            }
            $image_temp = $request->file('favicon');
            if($image_temp->isValid()){
                //Get Image Extension
                $extension = $image_temp->getClientOriginalExtension();
                //Generate New Image Name
                $imageName = time().'.'.$extension;
                $imagePath = 'images/logo/'.$imageName;
                Image::make($image_temp)->resize(130,130)->save($imagePath);
                $company->favicon = $imageName;
            }
        }
        
        $company->save();
        return redirect(route('company-details.index'))->with('success','Company Details Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
