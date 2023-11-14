<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $no = 1;
        $product = Product::all();

        for ($i=0; $i < count($product); $i++) {
            $path = 'assets/img/product/';
            $img = $product[$i]['img'];
            $product[$i]['img'] = $path . $img;
        }

        return view('cms.product.index', compact('no', 'product'));
    }

    public function show(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();

        $path = '../assets/img/product/';
        $img = $product['img'];
        $product['img'] = $path . $img;

        return view('cms.product.show', compact('product'));
    }

    public function create()
    {
        return view('cms.product.tambah');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'product_name' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'price' => 'required|numeric',
                'stok' => 'required|numeric',
                'status' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $imageName = $request->product_name . '.' . $request->image->extension();
        $uploadedImage = $request->image->move(public_path('assets/img/product'), $imageName);

        $product = product::create([
            'product_name' => $request->product_name,
            'img' => $imageName,
            'price' => $request->price,
            'stok' => $request->stok,
            'status' => $request->status,
        ]);

        if ($product) {
            Session::flash('berhasil', 'Berhasil Menambah Product');
            return redirect()->route('product.index');
        }
        Session::flash('gagal', 'Gagal Menambah Product');
        return redirect()->back();
    }

    public function edit(Product $product)
    {
        $path = '../../assets/img/product/';
        $img = $product['img'];
        $product['img'] = $path . $img;
        return view('cms.product.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'product_name' => 'required',
                'price' => 'required|numeric',
                'stok' => 'required|numeric',
                'status' => 'required',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $input = $request->all();
        
        if ($request->file('image') != null) {
            $validator = Validator::make(
                $request->all(),
                [
                    'product_name' => 'required',
                    'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                    'price' => 'required|numeric',
                    'stok' => 'required|numeric',
                    'status' => 'required',
                ]
            );
    
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            
            $imageName = $request->product_name . '.' . $request->image->extension();
            $uploadedImage = $request->image->move(public_path('assets/img/product'), $imageName);
            $input['img'] = $imageName;
        }else{
            $imageName = $product->img;
            $input['img'] = $imageName;
        }

        $product->update($input);

        if ($product) {
            Session::flash('berhasil', 'Berhasil Mengubah Product');
            return redirect()->route('product.index');
        }

        Session::flash('gagal', 'Gagal Mengubah Product');
        return redirect()->back();
    }

    public function destroy(Product $product)
    {
        $product->delete();

        if ($product) {
            Session::flash('berhasil', 'Berhasil Menghapus Product');
            return redirect()->route('product.index');
        }

        Session::flash('gagal', 'Gagal Menghapus Product');
        return redirect()->back();
    }
}
