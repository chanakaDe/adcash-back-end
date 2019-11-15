<?php

namespace App\Http\Controllers;

use App\Order;
use DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function showAllOrders()
    {
        $orders = DB::table('orders')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->join('products', 'products.id', '=', 'orders.product_id')
            ->select('orders.*', 'users.full_name', 'products.unit_price', 'products.name')
            ->get();
        return response()->json($orders);
    }

    public function showOrdersByDate($condition, $givenDate)
    {
        $orders = "";

        if ($condition == "today") {

            $orders = DB::table('orders')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->join('products', 'products.id', '=', 'orders.product_id')
                ->select('orders.*', 'users.full_name', 'products.unit_price', 'products.name')
                ->where('orders.order_date', '=', $givenDate)->get();

        } else if ($condition == "7days") {

            // Getting 7 days ago date according to given order date
            $startDate = date('Y-m-d', strtotime('-7 days', strtotime($givenDate)));

            $orders = DB::table('orders')
                ->join('users', 'users.id', '=', 'orders.user_id')
                ->join('products', 'products.id', '=', 'orders.product_id')
                ->select('orders.*', 'users.full_name', 'products.unit_price', 'products.name')
                ->whereBetween('orders.order_date', [$startDate, $givenDate])->get();
        }

        return response()->json($orders);
    }

    public function showOrdersByUserOrProductName($name)
    {
        $name = "%" . urldecode($name) . "%";
        $orders = DB::table('orders')
            ->join('users', 'users.id', '=', 'orders.user_id')
            ->join('products', 'products.id', '=', 'orders.product_id')
            ->select('orders.*', 'users.full_name', 'products.unit_price', 'products.name')
            ->where('users.full_name', 'like', $name)
            ->orWhere('products.name', 'like', $name)
            ->get();
        return response()->json($orders);
    }

    public function showOneOrder($id)
    {

        return response()->json(Order::find($id));
    }

    public function create(Request $request)
    {

        $this->validate($request, [
            'user_id' => 'required',
            'product_id' => 'required',
            'order_qty' => 'required',
            'total_price' => 'required',
            'net_total' => 'required',
            'order_date' => 'required|date',
        ]);

        $order = Order::create($request->all());

        return response()->json($order, 201);
    }

    public function update($id, Request $request)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());

        return response()->json($order, 200);
    }

    public function delete($id)
    {
        $value = Order::findOrFail($id)->delete();
        return response()->json(["message" => "Deleted", "code" => 200, "value" => $value]);
    }
}
