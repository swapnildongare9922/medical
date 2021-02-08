<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::get()->all();
        $product_type = ProductType::get()->all();
        return view('admin.product.product', ['product' => $product,'product_type'=>$product_type]);
    }

    public function insertProduct(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'company' => 'required',
            'type' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors());
        }

        $product = new Product();
        $product->name = $request->name;
        $product->company = $request->company;
        $product->type = $request->type;
        $product->save();

        flash('Product added !')->success()->important();
        return redirect()->back();
    }

    public function deleteProduct(Request $request)
    {
        $product = Product::find($request->id);
        $product->delete();

        flash('Product removed !')->warning()->important();
        return redirect()->back();
    }
    public function getUpdateProduct(Request $request)
    {
        $product = Product::find($request->id);
        $product_type = ProductType::get()->all();
        return view('admin.product.updateProduct', ['product' => $product,'product_type'=>$product_type]);
    }
    public function updateProduct(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'company' => 'required',
            'type' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json($validate->errors());
        }
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->company = $request->company;
        $product->type = $request->type;
        $product->update();

        flash('Product updated !')->success()->important();
        return redirect('/admin/home/products');
    }
}
