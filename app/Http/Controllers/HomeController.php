<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = auth()->user();

        if ($data == null) {
            $status = 'not-login';
        } else {
            $status = 'login';
        }

        $product = Product::where('status', 'aktif')->limit(3)->get();

        for ($i=0; $i < count($product); $i++) {
            $path = 'assets/img/product/';
            $img = $product[$i]['img'];
            $product[$i]['img'] = $path . $img;
        }

        return view('home.home', compact('status', 'product'));
    }

    public function shop()
    {
        $data = auth()->user();

        if ($data == null) {
            $status = 'not-login';
        } else {
            $status = 'login';
        }

        $product = Product::where('status', 'aktif')->get();

        for ($i=0; $i < count($product); $i++) {
            $path = 'assets/img/product/';
            $img = $product[$i]['img'];
            $product[$i]['img'] = $path . $img;
        }

        return view('home.shop', compact('status', 'product'));
    }

    public function about()
    {
        $data = auth()->user();

        if ($data == null) {
            $status = 'not-login';
        } else {
            $status = 'login';
        }

        return view('home.about', compact('status'));
    }
}
