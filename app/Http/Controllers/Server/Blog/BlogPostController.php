<?php

namespace App\Http\Controllers\Server\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Server\Blog\Blog_category;
use App\Models\Server\Blog\Blog_post;
use Image;
use Illuminate\Support\Facades\File;
class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Blog_post::with('category')->get()->all();
        return view('server.blog.post.index')->with(compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Blog_category::where('status','Active')->get()->all();
        return view('server.blog.post.create')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'category_id'=>'required',
            'title'=>'required',
            'post'=>'required',
            ];
        $this->validate($request,$rules);

        $post = new Blog_post();
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->post = $request->post;

        //dd($request->file('brand_image'));
        //dd($request->hasFile('brand_image'));
        if($request->hasFile('image')){
            $image_temp = $request->file('image');
            if($image_temp->isValid()){
                //Get Image Extension
                $extension = $image_temp->getClientOriginalExtension();
                //Generate New Image Name
                $imageName = time().'.'.$extension;
                $imagePath = 'images/blog/'.$imageName;
                Image::make($image_temp)->resize(870,483)->save($imagePath);
                $post->image = $imageName;
            }
        }


        $post->save();
        return redirect(route('blog-post.index'))->with('success','Blog Post Create Successfully!');
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
        $categories = Blog_category::where('status','Active')->get()->all();
        $post = Blog_post::where('id',$id)->get()->first();
        return view('server.blog.post.edit')->with(compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'category_id'=>'required',
            'title'=>'required',
            'post'=>'required',
            ];
        $this->validate($request,$rules);
        $post = Blog_post::findorFail($id);
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->post = $request->post;

        if($request->hasFile('image')){
            $exists = 'images/blog/'.$post->image;
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
                $imagePath = 'images/blog/'.$imageName;
                Image::make($image_temp)->resize(870,483)->save($imagePath);
                $post->image = $imageName;
            }
        }

        $post->update();

        return redirect(route('blog-post.index'))->with('success','Blog Post Update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Blog_post::findorFail($id);
        $exists = 'images/blog/'.$post->image;
        if(File::exists($exists))
        {
            File::delete($exists);
        }
        $post->delete();
        $message  = "Blog Post Delete Successfully Done";
        return redirect(route('blog-post.index'))->with("success",$message);
    }
}
