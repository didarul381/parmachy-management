<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use Session;

class ParmachyManagmantController extends Controller
{
    public function index()
    {
        return view('website.index',['mediciens'=> Medicine::all()]);
    }

    public function create (Request $request){
        Medicine::addMedicine($request);
        return redirect('/')->with('message','Medicine info added successfully.');
       
        

    }

    public function edit($id){
       
        return view('website.index',['medicien'=> Medicine::find($id)]);
        
        
    }

    public function update(Request $request,$id){
        
        Medicine::updateMedicine($request,$id);
        return redirect('/')->with('message','Medicine info update successfully.');
        
    }

    public function delete(){

        return response()->json(Medicine::where('id',$_GET['id'])->delete());
    }
}
