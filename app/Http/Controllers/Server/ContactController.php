<?php

namespace App\Http\Controllers\Server;

use App\Http\Controllers\Controller;
// use App\Http\Controllers\Server\ContactController;
use Illuminate\Http\Request;
use App\Models\Contact;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::get()->all();
        return view('server.contact.index')->with(compact('contacts'));   
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
        $rules = [
            'name' => 'required',
            'number' => 'required',
            'message' => 'required'
        ];
        $this->validate($request,$rules);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->number = $request->number;
        $contact->email = $request->email;
        $contact->message = $request->message;

        $contact->save();
        return redirect(route('contact.index'))->with('success','New Contact Information Save Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $contact = Contact::findorFail($id);
         $contact->delete();
        return redirect(route('contact.index'))->with('success','Contact Information Delete Successfully!');
    }
}
