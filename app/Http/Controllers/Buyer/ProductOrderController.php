<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use App\Models\OrderProducts;
use App\Models\Orders;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductOrderController extends Controller
{
    public function giveOrder()
    {
        $product = Product::get()->all();
        return view('buyer.order.order-form', ['product' => $product]);
    }

    public function productOrder(Request $req)
    {
        $validate = Validator::make($req->all(), [
            'product' => 'required',
            'quantity' => 'required'
        ]);

        if ($validate->fails()) {
            flash($validate->errors());
            return redirect()->back();
        }

        try {

            $order = new Orders();
            $order->buyer_id = Auth::user()->id;
            $order->status = 0;
            $order->save();

            for($i=0;$i<count($req->product);$i++)
            {
                $product = new OrderProducts();
                $product->order_id = $order->id;
                $product->product_id = $req->product[$i];
                $product->quantity = $req->quantity[$i];
                $product->save();

            }


            flash('Product Ordered !')->success()->important();
            return redirect()->back();
        } catch (Exception $th) {
            return response()->json($th->getMessage());
        }

        // return response()->json($req->all());
    }
}
