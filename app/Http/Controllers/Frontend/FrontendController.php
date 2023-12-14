<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders=Slider::where('status','0')->get();
        return view('frontend.index',compact('sliders'));
    }

    public function categories()
    {
        $categories=Category::where('status','0')->get();
        return view('frontend.collection.category.index',compact('categories'));
    }

    public function products($category_slug)
    {
        $category=Category::where('slug',$category_slug)->first();


        if ($category){
            return view('frontend.collection.products.index',compact('category'));
        }else{
            return redirect()->back();
        }
    }

    public function productsView($category_slug, $product_slug)
    {
        $category=Category::where('slug',$category_slug)->first();
        $products=$category->products()->get();

        if ($category){

            $product=$category->products()->where('slug',$product_slug)->where('status','0')->first();
            if ($product){
                return view('frontend.collection.products.view',compact('product','category'));
            }else{
                return redirect()->back();
            }

        }else{
            return redirect()->back();
        }
    }

    public function thankyou()
    {
        return view('frontend.thankyou');
    }

    public function newArrival()
    {
        $newArrivals=Product::latest()->take(4)->get();
        return view('frontend.pages.new-arrival',compact('newArrivals'));
    }

    public function searchProduct(Request $request)
    {
       if ($request->search){
           $searchProduct = Product::where('name', 'LIKE', '%' . $request->search . '%')
               ->orWhere('brand', 'LIKE', '%' . $request->search . '%')
               ->orWhereHas('category', function ($query) use ($request) {
                   $query->where('name', 'LIKE', '%' . $request->search . '%');
               })
               ->get();

           return view('frontend.pages.search',compact('searchProduct'));
       }else{
           return redirect()->back()->wih('message','No search');
       }
    }
}
