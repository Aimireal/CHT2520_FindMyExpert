<?php

namespace App\Http\Controllers;

use App\Expert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpertController extends Controller
{
    public function index()
    {
        //Display the homepage
        $experts = Expert::paginate(10);
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
                'companyType' => 'required',
                'companyName' => 'required',
                'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'required',
                'phone' => 'required'
            ]);

        $expert = new Expert;
        $expert->company_type = $request->companyType;
        $expert->company_name = $request->companyName;
        $expert->first_name = $request->firstName;
        $expert->last_name = $request->lastName;
        $expert->email = $request->email;
        $expert->phone = $request->phone;
        $expert->save();
        return redirect(route('column-searching'))->with('successMsg', 'Expert Successfully Added');
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
                'companyType' => 'required',
                'companyName' => 'required',
                'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'required',
                'phone' => 'required'
            ]);

        $expert = Expert::find($id);
        $expert->company_type = $request->companyType;
        $expert->company_name = $request->companyName;
        $expert->first_name = $request->firstName;
        $expert->last_name = $request->lastName;
        $expert->email = $request->email;
        $expert->phone = $request->phone;
        $expert->save();
        return redirect(route('column-searching'))->with('successMsg', 'Expert Updated');
    }

    public function delete($id)
    {
        //Delete an entry from the DB
        Expert::find($id)->delete();
        return redirect(route('column-searching'))->with('successMsg', 'Expert Removed');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view()
    {
        //Create view to add new user
        return view('view');
    }

    public function columnSearching()
    {
        //Browse view
        $category = DB::table('category')
            ->select("*")
            ->get();
        return view('column_searching', compact('category'));
    }

}
