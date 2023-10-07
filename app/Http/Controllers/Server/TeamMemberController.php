<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Server\Team_member;
use Illuminate\Support\Facades\File;
use Image;
class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Team_member::get()->all();
        return view('server.team_member.index')->with(compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('server.team_member.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name'=>'required',
            'designation'=>'required'
            ];
        $this->validate($request,$rules);
        $member = new Team_member();
        $member->name = $request->name;
        $member->designation = $request->designation;
        $member->facebook = $request->facebook;
        $member->twitter = $request->twitter;
        $member->instagram = $request->instagram;
        $member->description = $request->description;
        
        //dd($request->file('brand_image'));
        //dd($request->hasFile('brand_image'));
        if($request->hasFile('image')){
            $image_temp = $request->file('image');
            if($image_temp->isValid()){
                //Get Image Extension
                $extension = $image_temp->getClientOriginalExtension();
                //Generate New Image Name
                $imageName = time().'.'.$extension;
                $imagePath = 'images/team/'.$imageName;
                Image::make($image_temp)->resize(240,240)->save($imagePath);
                $member->image = $imageName;
            }
        }

        
        $member->save();
        return redirect(route('team-member.index'))->with('success','New Member Save Successfully!');
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
        $member = Team_member::where('id',$id)->get()->first();
        return view('server.team_member.edit')->with(compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name'=>'required',
            'designation'=>'required'
            ];
        $this->validate($request,$rules);
        $member = Team_member::findorFail($id);
        $member->name = $request->name;
        $member->designation = $request->designation;
        $member->facebook = $request->facebook;
        $member->twitter = $request->twitter;
        $member->instagram = $request->instagram;
        $member->description = $request->description;
        if($request->hasFile('image')){
            $exists = 'images/team/'.$member->image;
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
                $imagePath = 'images/team/'.$imageName;
                Image::make($image_temp)->resize(240,240)->save($imagePath);
                $member->image = $imageName;
            }
        }

        $member->update();

        return redirect(route('team-member.index'))->with('success','Member Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = Team_member::findorFail($id);
        $exists = 'images/team/'.$member->image;
        if(File::exists($exists))
        {
            File::delete($exists);
        }
        $member->delete();
        $message  = "Member Delete Successfully Done";
        return redirect(route('team-member.index'))->with("success",$message);
    }
}
