<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use ShoppingCart;

class SalesController extends Controller
{
    private $medicine;
    public function index()
    {

        return view('website.sales.index',['carts'=>ShoppingCart::all()]);
    }
    
    public function varcode()
    {
        return response()->json(Medicine::where('bar_code',$_GET['id'])->get());
    }

    public function addtocart(Request $request){

        ShoppingCart::add($request->product_id, $request->product, $request->qty, $request->selling_price);
        return redirect('/medicine-sales');
    }

    public function remove($id){
        ShoppingCart::remove($id);
        return redirect('/medicine-sales');
    }
    public function update(Request $request,$id){
        ShoppingCart::update($id, $request->qty);
        return redirect('/medicine-sales');
    }

   
}
