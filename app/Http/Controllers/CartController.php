<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addcart(Product $product, $id)
    {
        $product = Product::where('id', $id)->first();

        $dataid = auth()->user()->id;

        $totalprice = 1 * $product['price'];

        $cart = Cart::create([
            'user_id' => $dataid,
            'product_id' => $id,
            'qty' => 1,
            'total_price' => $totalprice,
        ]);

        if ($product) {
            return redirect()->back();
        }
    }

    public function index()
    {
        $data = auth()->user();

        if ($data == null) {
            $status = 'not-login';
        } else {
            $status = 'login';
        }

        $no = 1;
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

        $adm = 25000;
        $total = $subtotal + $adm;

        return view('home.cart', compact('status', 'no', 'cart', 'subtotal', 'adm', 'total'));
    }

    public function edit(Cart $cart)
    {
        $data = auth()->user();

        if ($data == null) {
            $status = 'not-login';
        } else {
            $status = 'login';
        }

        $cart = Cart::join('tb_product', 'tb_cart.product_id', '=', 'tb_product.id')->select('tb_product.*', 'tb_cart.*')->where('tb_cart.id', $cart["id"])->first();

        return view('home.updatecart', compact('status', 'cart'));
    }

    public function update(Request $request, Cart $cart)
    {
        $input = [
            'qty' => $request->qty,
            'total_price' => $request->total_price[0],
        ];

        $cart->update($input);

        return redirect()->route('cart.index');
    }

    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->back();
    }
}
