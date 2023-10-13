<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Server\Banner;
use App\Models\Server\Counter;
use App\Models\Server\Review;
use App\Models\Server\PricingPlane;
use App\Models\Server\About_tab;
use App\Models\Server\Service\Service;
use App\Models\Server\Blog\Blog_post;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog_post::with('category')->orderBy('id','DESC')->skip(0)->take(9)->get();
        $counter = Counter::get()->first();
        $reviews = Review::get()->all();
        $pricingplans = PricingPlane::get()->all();
        $abouts = About_tab::where('status','Active')->orderBy('order','ASC')->get()->all();
        $banners = Banner::where('status','Active')->get()->all();
        $services = Service::with('service_details')->get()->all();
        $service_count = Service::get()->count();
        //dd($banners);
        return view('client.home-page')->with(compact('banners','reviews','counter','services','service_count','pricingplans','abouts','blogs'));
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
