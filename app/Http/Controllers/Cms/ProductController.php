<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductsAttribute;

use Session;
use Image;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::all();
    	return view('backend.product.index', compact('products'));
    }

    public function create()
    {
    	return view('backend.product.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name'  => 'required', /*|regex:/^[\pL\s\-]+$/u*/
            'product_price' => 'required|numeric',
            'image'         => 'required',
            'description'   => 'required',
        ]);

        $product = new Product;

        $product->category_id          = $request->category_id;
        $product->product_name         = $request->product_name;
        $product->product_slug         = str_slug($request->product_name);
        $product->product_price        = $request->product_price;
        $product->description          = $request->description;

        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if ($image_tmp->isValid()) {
                $image_name = $image_tmp->getClientOriginalName();
                $extension = $image_tmp->getClientOriginalExtension();
                $image_new_name = $image_name.'-'.rand(111,99999).'.'.$extension;

                $original_image_path = 'app/uploads/product_images/large/'.$image_new_name;
                $medium_image_path = 'app/uploads/product_images/medium/'.$image_new_name;
                $small_image_path = 'app/uploads/product_images/small/'.$image_new_name;

                Image::make($image_tmp)->save($original_image_path);
                Image::make($image_tmp)->resize(520,600)->save($medium_image_path);
                Image::make($image_tmp)->resize(260,300)->save($small_image_path);

                $product->image = $image_new_name;
            }
        }

        $product->save();

        Session::flash('success', 'Product Added Successfully !');
        return redirect()->route('product.index');
    }

    public function edit($id)
    {
    	$product = Product::find($id);
        return view('backend.product.edit', compact('product'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'product_name'  => 'required', /*|regex:/^[\pL\s\-]+$/u*/
            'product_price' => 'required|numeric',
            'description'   => 'required',
        ]);

        $product = Product::findOrFail($id);

        $product->category_id          = $request->category_id;
        $product->product_name         = $request->product_name;
        $product->product_slug         = str_slug($request->product_name);
        $product->product_price        = $request->product_price;
        $product->description          = $request->description;

        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if ($image_tmp->isValid()) {
                $image_name = $image_tmp->getClientOriginalName();
                $extension = $image_tmp->getClientOriginalExtension();
                $image_new_name = $image_name.'-'.rand(111,99999).'.'.$extension;

                $original_image_path = 'app/uploads/product_images/large/'.$image_new_name;
                $medium_image_path = 'app/uploads/product_images/medium/'.$image_new_name;
                $small_image_path = 'app/uploads/product_images/small/'.$image_new_name;

                Image::make($image_tmp)->save($original_image_path);
                Image::make($image_tmp)->resize(520,600)->save($medium_image_path);
                Image::make($image_tmp)->resize(260,300)->save($small_image_path);

                $product->image = $image_new_name;
            }
        }

        $product->save();

        Session::flash('info', 'Product updated successfully.');
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        Session::flash('error', 'product Deleted Successfully !');
        return redirect()->route('product.index');
    }

    public function add_attributes($id)
    {
        $product = Product::with(['category' => function($query){  
                        $query->select('id', 'name');
                    }])->where('products.id', $id)->first();

        $productattr = Product::with('attributes')->where('id', $id)->first();
              
        return view('backend.product.add-attributes', compact('product', 'productattr'));
    }

    public function store_attributes($id, Request $request)
    {
        $data = $request->all();

        /*dd($data['size']);*/
        foreach ($data['size'] as $key => $value) {
            if (!empty($value)) {

                // Size already exists
                $attrCountsize = ProductsAttribute::where(['product_id' => $id, 'size' => $data['size'][$key]])->count();
                if ($attrCountsize > 0) {
                    Session::flash('error', 'Size already exists ! Try different one.');
                    return redirect()->back();
                }

                // Color already exists
                $attrCountcolor = ProductsAttribute::where(['product_id' => $id, 'color' => $data['color'][$key]])->count();
                if ($attrCountcolor > 0) {
                    Session::flash('error', 'Color already exists ! Try different one.');
                    return redirect()->back();
                }


                $attribute = new ProductsAttribute();
                $attribute->product_id = $id;
                $attribute->size = $data['size'][$key];
                $attribute->color = $data['color'][$key];
                $attribute->save();

            }
        }

        Session::flash('success', 'Product Attributes Added Successfully !');
        return redirect()->back();
    }

    public function attribute_destroy($id)
    {
        $proattr = ProductsAttribute::findOrFail($id);
        $proattr->delete();

        Session::flash('error', 'Product Attributes Deleted Successfully !');
        return redirect()->back();
    }

}
