<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ProductTypeController extends Controller
{
    public function index()
    {
        $product_type = ProductType::get()->all();
        return view('admin.product-type.product-type',['product_type'=>$product_type]);
    }

    public function insertProduct(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'title'=>'required|unique:product_types,title'
        ]);
        if($validate->fails()){
            flash($validate->errors());
            return redirect()->back();
        }

        $pro = new ProductType();
        $pro->title = $request->title;
        $pro->slug = Str::random(3).Str::of(strtolower($request->title))->substr(0,2);
        $pro->save();
        flash('Succfully added !')->success()->important();
        return redirect()->back();
    }

    public function deleteProduct(Request $request)
    {
        $pro = ProductType::get()->where('slug',$request->slug)->first();
        $pro->delete();
        flash('Succfully removed !')->warning()->important();
        return redirect()->back();
    }

    public function getUpdateProduct(Request $request)
    {
        $pro = ProductType::get()->where('slug',$request->slug)->first();

        return view('admin.product-type.update-product-type',['pro',$pro]);
    }

    public function updateProduct(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'title'=>'required|unique'
        ]);
        if($validate->fails()){
            flash($validate->errors());
            return redirect()->back();
        }

        $pro = ProductType::get()->where('slug',$request->slug)->first();
        $pro->title = $request->title;
        $pro->slug = Str::random(3).Str::of(strtolower($request->title))->substr(0,2);
        $pro->save();
        flash('Succfully added !')->success()->important();
        return redirect('/admin/home/product-type');
    }
}
