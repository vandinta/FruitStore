<?php

namespace App\Http\Controllers;

use Midtrans\Config;
use Midtrans\Notification;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $data = auth()->user();

        if ($data == null) {
            $status = 'not-login';
        } else {
            $status = 'login';
        }

        $cart = Cart::join('tb_product', 'tb_cart.product_id', '=', 'tb_product.id')->select('tb_product.*', 'tb_cart.*')->where('user_id', $data["id"])->get();

        for ($i = 0; $i < count($cart); $i++) {
            $path = 'assets/img/product/';
            $img = $cart[$i]['img'];
            $cart[$i]['img'] = $path . $img;
        }

        $subtotal = 0;
        for ($i = 0; $i < count($cart); $i++) {
            $harga = $cart[$i]['total_price'];
            $subtotal += $harga;
        }

        if ($subtotal != 0) {
            $adm = 25000;
        } else {
            $adm = 0;
        }

        $total = $subtotal + $adm;

        return view('home.checkout', compact('status', 'data', 'cart', 'subtotal', 'adm', 'total'));
    }

    public function checkout(Request $request, Product $product)
    {
        $data = auth()->user();

        if ($data == null) {
            $status = 'not-login';
        } else {
            $status = 'login';
        }

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'sub_price' => $request->sub_price,
            'admin_price' => $request->admin_price,
            'total_price' => $request->total_price,
        ]);

        $order_id = $order->id;

        $cart = Cart::join('tb_product', 'tb_cart.product_id', '=', 'tb_product.id')->select('tb_product.*', 'tb_cart.*')->where('user_id', auth()->user()->id)->get();

        for ($i = 0; $i < count($cart); $i++) {
            $orderitems[$i] = OrderItems::create([
                'order_id' => $order_id,
                'product_id' => $cart[$i]['product_id'],
                'qty' => $cart[$i]['qty'],
                'price' => $cart[$i]['price'],
                'subtotal_price' => $cart[$i]['total_price'],
            ]);

            $product = Product::where('id', $cart[$i]['product_id'])->first();

            $stok[$i] = $product['stok'] - $cart[$i]['qty'];

            $input = [
                'stok' => $stok[$i],
            ];

            $product->update($input);

            $tb_cart = Cart::where('id', $cart[$i]['id'])->first();

            $tb_cart->delete();
        }

        $listitems = OrderItems::join('tb_product', 'tb_orderitems.product_id', '=', 'tb_product.id')->select('tb_product.product_name', 'tb_orderitems.*')->where('order_id', $order_id)->get();
        $no = 1;

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order_id,
                'gross_amount' => $request->total_price,
            ),
            'customer_details' => array(
                'username' => auth()->user()->username,
                'email' => auth()->user()->email,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('home.order', compact('status', 'snapToken', 'order', 'no', 'listitems'));
    }

    public function callback()
    {
        // Set your Merchant Server Key
        Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = false;

        $notification = new Notification();

        $status = $notification->transaction_status;
        $order_id = $notification->order_id;

        $order = Order::findOrFail($order_id);

        if ($status == 'capture') {
            $order->update([
                'status' => 'paid'
            ]);
            return redirect()->route('shop');
        } else if ($status == 'settlement') {
            $order->update([
                'status' => 'paid'
            ]);
            return redirect()->route('shop');
        } else if ($status == 'pending') {
            $order->update([
                'status' => 'unpaid'
            ]);
            return redirect()->route('shop');
        } else if ($status == 'expire') {
            $order->update([
                'status' => 'cancel'
            ]);
            return redirect()->route('shop');
        } else if ($status == 'cancel') {
            $order->update([
                'status' => 'cancel'
            ]);
            return redirect()->route('shop');
        }
    }
}
