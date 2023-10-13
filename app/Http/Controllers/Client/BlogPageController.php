<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Server\Blog\Blog_post;
use App\Models\Server\Blog\Blog_category;
use App\Models\Server\Service\Service;
class BlogPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog_post::with('category')->paginate(6);
        $services = Service::with('service_details')->get()->all();
        $categories = Blog_category::get()->all();

        return view('client.blog-page')->with(compact('blogs','services','categories'));
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
        $blog = Blog_post::with('category')->where('id',$id)->get()->first();
        $services = Service::with('service_details')->get()->all();
        $categories = Blog_category::get()->all();

        return view('client.blog-single-page')->with(compact('blog','services','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
