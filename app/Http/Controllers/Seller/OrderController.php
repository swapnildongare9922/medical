<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\OrderProducts;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function getOrders()
    {
        $seller_area = DB::selectOne('SELECT area FROM user_details WHERE user_id = ?', [Auth::user()->id]);
        $orders  = DB::select('SELECT orders.id  AS order_id , users.name AS user_name , user_details.mobile_no AS user_mobile , user_details.address AS user_address, areas.title AS user_area ,  ord_prod.id AS ordered_product_id, ord_prod.quantity AS ordered_product_quantity, ord_prod.price AS ordered_product_price,products.name AS product_name , products.company AS product_company , product_types.title AS product_type, orders.created_at AS ordered_date FROM users,areas,orders,order_products ord_prod ,user_details,products,product_types WHERE users.id = user_details.user_id AND orders.buyer_id = user_details.user_id AND orders.id = ord_prod.order_id AND ord_prod.product_id = products.id AND products.type = product_types.id  AND user_details.area =  areas.id AND user_details.area = ?', [$seller_area->area]);

        return view('seller.orders.orders', ['orders' => $orders]);
        // return response()->json([$orders]);
    }
}
