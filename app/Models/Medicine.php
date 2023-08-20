<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    private  static  $medicine;

    public static function addMedicine($request)
    {
    self::$medicine = new Medicine();
    self ::$medicine->bar_code=$request->bar_code;
    self ::$medicine->med_name=$request->med_name;
    self ::$medicine->category=$request->category;
    self ::$medicine->quantity=$request->quantity;
    self ::$medicine->sell_type=$request->sell_type;
    self ::$medicine->reg_date=date($request->reg_date);
    self ::$medicine->exp_date=date($request->exp_date);
    self ::$medicine->company=$request->company;
    self ::$medicine->actual_price=$request->actual_price;
    self ::$medicine->selling_price=$request->selling_price;
    self ::$medicine->profit_price=$request->profit_price;
    self::$medicine->save();

    return self::$medicine;

    }

    public static function updateMedicine($request,$id)
    {
        self::$medicine=Medicine::find($id);

        self ::$medicine->bar_code=$request->bar_code;
        self ::$medicine->med_name=$request->med_name;
        self ::$medicine->category=$request->category;
        self ::$medicine->quantity=$request->quantity;
        self ::$medicine->sell_type=$request->sell_type;
        self ::$medicine->reg_date=date($request->reg_date);
        self ::$medicine->exp_date=date($request->exp_date);
        self ::$medicine->company=$request->company;
        self ::$medicine->actual_price=$request->actual_price;
        self ::$medicine->selling_price=$request->selling_price;
        self ::$medicine->profit_price=$request->profit_price;
        self::$medicine->save();

    }
}
