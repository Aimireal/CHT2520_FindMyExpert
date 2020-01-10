<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class ColumnSearchingController extends Controller
{
    //Display Experts
    function index(Request $request)
    {
        if(request()->ajax())
        {
            if($request->category)
            {
                $data = DB::table('experts')
                    ->join('category', 'category.category_id', '=', 'experts.company_type')
                    ->select('experts.id', 'experts.company_name', 'category.category_name', 'experts.first_name', 'experts.last_name', 'experts.email', 'experts.phone')
                    ->where('experts.company_type', $request->category);
            } else
            {
                $data = DB::table('experts')
                    ->join('category', 'category.category_id', '=', 'experts.company_type')
                    ->select('experts.id', 'experts.company_name', 'category.category_name', 'experts.first_name', 'experts.last_name', 'experts.email', 'experts.phone');
            }
            return datatables()->of($data)
                ->addColumn('editColumn', function($data){
                    return "<a class='btn btn-xs btn-success' href='/edit/$data->id'>Edit</a>";
                })
                ->rawColumns(['editColumn'])
                ->make(true);
        }

        $experts = Expert::all();
        $category = DB::table('category')
            ->select("*")
            ->get();
        return view('column_searching', compact('category'))->with('experts', $experts);
    }
}