<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Server\Review;
use Illuminate\Support\Facades\File;
use Image;
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::get()->all();
        return view('server.review.index')->with(compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('server.review.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name'=>'required',
            'review'=>'required'
            ];
        $this->validate($request,$rules);

        $review = new Review();
        $review->name = $request->name;
        $review->position = $request->position;
        $review->review = $request->review;
        
        //dd($request->file('brand_image'));
        //dd($request->hasFile('brand_image'));
        if($request->hasFile('image')){
            $image_temp = $request->file('image');
            if($image_temp->isValid()){
                //Get Image Extension
                $extension = $image_temp->getClientOriginalExtension();
                //Generate New Image Name
                $imageName = time().'.'.$extension;
                $imagePath = 'images/review/'.$imageName;
                Image::make($image_temp)->resize(300,300)->save($imagePath);
                $review->image = $imageName;
            }
        }

        
        $review->save();
        return redirect(route('review.index'))->with('success','New Review Save Successfully!');
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
        $review  =  Review::where('id',$id)->get()->first();
        return view('server.review.edit')->with(compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name'=>'required',
            'review'=>'required'
            ];
        $this->validate($request,$rules);
        $review = Review::findorFail($id);
        $review->name = $request->name;
        $review->position = $request->position;
        $review->review = $request->review;

        if($request->hasFile('image')){
            $exists = 'images/review/'.$review->image;
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
                $imagePath = 'images/review/'.$imageName;
                Image::make($image_temp)->resize(300,300)->save($imagePath);
                $review->image = $imageName;
            }
        }

        $review->update();

        return redirect(route('review.index'))->with('success','Review Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = Review::findorFail($id);
        $exists = 'images/review/'.$review->image;
        if(File::exists($exists))
        {
            File::delete($exists);
        }
        $review->delete();
        $message  = "Review Delete Successfully Done";
        return redirect(route('review.index'))->with("success",$message);
    }
}
