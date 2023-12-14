<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products= Product::orderBy('id')->paginate(5);
        return view('admin.product.index',compact('products'));
    }

    public function create()
    {
        $categories=Category::all();
        $brands=Brand::all();
        return view('admin.product.create',compact('categories','brands'));
    }

    public function store(ProductRequest $request)
    {
        $validatedData=$request->validated();
        $category=Category::findOrFail($validatedData['category_id']);
       $product= $category->products()->create([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'brand' => $validatedData['brand'],
            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'quantity' => $validatedData['quantity'],
            'trending' => $request->trending == true ? '1' : '0',
            'status' => $request->status == true ? '1' : '0',
            'small_description' => $validatedData['small_description'],
            'description' => $validatedData['description'],
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description'],
        ]);
       //for image

        // Check if there are files in the request
        if ($request->hasFile('image')) {
            $uploadPath = 'uploads/product/';

            // Loop through each uploaded file
            foreach ($request->file('image') as $key => $imageFile) {
                $extension = $imageFile->getClientOriginalExtension();
                $fileName = time() . '_' . $key . '.' . $extension;

                // Move the file to the upload path
                $imageFile->move($uploadPath, $fileName);

                // Create a new ProductImage and associate it with the product
                $product->productImage()->create([
                    'product_id' => $product->id,
                    'image' => $uploadPath.$fileName,
                ]);
            }
        }
        return redirect('/admin/product')->with('message','Product created successfully');

    }
    public function edit( $product_id)
    {
        $categories=Category::all();
        $brands=Brand::all();
        $product=Product::findOrFail($product_id);
        return view('admin.product.edit',compact('product','categories','brands'));
    }

    public function update(ProductRequest $request, $product_id)
    {
        $validatedData=$request->validated();
        $product=Category::findOrFail($validatedData['category_id'])
                    ->products()->where('id',$product_id)->first();

        if ($product){
            $product->update([
                'category_id' => $validatedData['category_id'],
                'name' => $validatedData['name'],
                'slug' => Str::slug($validatedData['slug']),
                'brand' => $validatedData['brand'],
                'original_price' => $validatedData['original_price'],
                'selling_price' => $validatedData['selling_price'],
                'quantity' => $validatedData['quantity'],
                'trending' => $request->trending == true ? '1' : '0',
                'status' => $request->status == true ? '1' : '0',
                'small_description' => $validatedData['small_description'],
                'description' => $validatedData['description'],
                'meta_title' => $validatedData['meta_title'],
                'meta_keyword' => $validatedData['meta_keyword'],
                'meta_description' => $validatedData['meta_description'],
            ]);

            //for image

            // Check if there are files in the request
            if ($request->hasFile('image')) {
                $uploadPath = 'uploads/product/';

                // Loop through each uploaded file
                foreach ($request->file('image') as $key => $imageFile) {
                    $extension = $imageFile->getClientOriginalExtension();
                    $fileName = time() . '_' . $key . '.' . $extension;

                    // Move the file to the upload path
                    $imageFile->move($uploadPath, $fileName);

                    // Create a new ProductImage and associate it with the product
                    $product->productImage()->create([
                        'product_id' => $product->id,
                        'image' => $uploadPath.$fileName,
                    ]);
                }
            }
            return redirect('/admin/product')->with('message','Product updated successfully');

        }else{
            return redirect('admin/index')->with('message','No such product found');
    }

    }

    public function destroy($product_id)
    {
        $product=Product::findOrFail($product_id);
        //delete image
        if ($product->productImage()){
            foreach ($product->productImage as $image){
                if (File::exists($image->image)){
                    File::delete($image->image);
                }

            }
        }
        $product->delete();
        return redirect('/admin/product')->with('message','Product deleted successfully');
    }
}
