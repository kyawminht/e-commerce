<?php

namespace App\Livewire\Frontend;

use App\Models\Cart;
use App\Models\Wishlist;
use Livewire\Component;

class CartShow extends Component
{
    public $cart;
    public $totalPrice=0;

    public function removeCart($cartId)
    {
        Cart::where('user_id', auth()->user()->id)->where('id', $cartId)->delete();

        $this->dispatch('addOrUpdateCart');
        $this->dispatch('message', [
            'text' => 'Cart removed successfully',
        ]);
    }
    public function render()
    {
        $this->cart=Cart::where('user_id',auth()->user()->id)->get();
        return view('livewire.frontend.cart-show',[
            'cart'=>$this->cart,
        ]);
    }
}
