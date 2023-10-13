<?php

namespace App\Http\Controllers\Server\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Server\Blog\Blog_category;
class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Blog_category::get()->all();
        return view('server.blog.category.index')->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('server.blog.category.create');
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

        $category = new Blog_category();
        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();
        return redirect(route('blog-category.index'))->with('success','Blog Category Create Successfully');
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
        $category = Blog_category::where('id',$id)->get()->first();
        return view('server.blog.category.edit')->with(compact('category'));
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

        $category = Blog_category::findorFail($id);
        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();
        return redirect(route('blog-category.index'))->with('success','Blog Category Create Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Blog_category::findorFail($id)->delete();
        return redirect(route('blog-category.index'))->with('success','Blog Category Delete Successfully');
    }

    public function updateBlogCategoryStatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            //$this->warn($data);
            // echo "<pre>"; print_r($data);die;
            if ($data['status']== 'Active') {
                $status = 'Inactive';
            }
            else{
                $status = 'Active';
            }
            Blog_category::where('id',$data['category_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'category_id'=> $data['category_id']]);

        }
    }
}
