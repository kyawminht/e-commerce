<?php

namespace App\Livewire\Frontend\Products;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $category,$product;

    public function addToCart($productId)
    {
        if (Auth::user()){
           if ($this->product->where('id',$productId)->where('status','0')){
               if ($this->product->quantity > 0){
                    Cart::create([
                        'user_id'=>\auth()->user()->id,
                        'product_id'=>$productId,
                    ]);
                    $this->dispatch('addOrUpdateCart');
                   $this->dispatch('message', [
                       'text' => 'Product Added to cart successfully',
                   ]);
               }else{
                   $this->dispatch('message', [
                       'text' => 'Out of stock! sorry',
                   ]);
               }

           }else{
               $this->dispatch('message', [
                   'text' => 'Product does not exists',
               ]);

           }
        }else{
            $this->dispatch('message', [
                'text' => 'Please Login to add to cart',
            ]);
            return false;
        }
    }
    public function addToWhishlist($productId)
    {
        if (Auth::check()){

            if (Wishlist::where('user_id',\auth()->user()->id)->where('product_id',$productId)->exists()){
                $this->dispatch('message', [
                    'text' => 'Already added to wishlist',
                ]);
                return false;
            }else{
                Wishlist::create([
                    'user_id'=>\auth()->user()->id,
                    'product_id'=>$productId,
                ]);
                $this->dispatch('removeOrAddedWishlist');
                $this->dispatch('message', [
                    'text' => 'Wishlist added successfully',
                ]);
            }


        }else{
            session()->flash('message', 'Please login to continue');
            $this->dispatch('message', [
                'text' => 'Please login to continue',
            ]);
            return false;
        }
    }
    public function mount($product,$category)
    {
        $this->product=$product;
        $this->category=$category;
    }
    public function render()
    {    return view('livewire.frontend.products.view', [
        'product' => $this->product,
        'category' => $this->category,
    ]);

    }
}
