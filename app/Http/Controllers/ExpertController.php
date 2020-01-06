<?php

namespace App\Http\Controllers;

use App\Expert;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    public function index()
    {
        $experts = Expert::all();
        return view('welcome', compact('experts'));
    }

    public function create()
    {
        //Create view to add new user
        return view('create');
    }

    public function store(Request $request)
    {
        //Store the values into the DB for add button
        $this->validate($request,
            [
                'companyName' => 'required',
                'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'required',
                'phone' => 'required'
            ]);

        $expert = new Expert;
        $expert->company_name = $request->companyName;
        $expert->first_name = $request->firstName;
        $expert->last_name = $request->lastName;
        $expert->email = $request->email;
        $expert->phone = $request->phone;
        $expert->save();
        return redirect(route('home'))->with('successMsg', 'Expert Successfully Added');
    }

    public function edit($id)
    {
        //Edit the entry from the main page on entry ID
        $expert = Expert::find($id);
        return view('edit',compact('expert'));
    }

    public function update(Request $request, $id)
    {
        //Update the entry we have changed under edit, almost same as store
        $this->validate($request,
            [
                'companyName' => 'required',
                'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'required',
                'phone' => 'required'
            ]);

        $expert = Expert::find($id);
        $expert->company_name = $request->companyName;
        $expert->first_name = $request->firstName;
        $expert->last_name = $request->lastName;
        $expert->email = $request->email;
        $expert->phone = $request->phone;
        $expert->save();
        return redirect(route('home'))->with('successMsg', 'Expert Updated');
    }

    public function viewDetailed()
    {
        //View more of selected user ToDo: Add reviews and ratings. Setup like the above

    }

}
