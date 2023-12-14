<?php

namespace App\Livewire\Frontend;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartCount extends Component
{

    public $cartCount;

protected $listeners = ['addOrUpdateCart' => 'checkCartCount'];
    public function checkCartCount()
    {
        if (Auth::user()){
            return $this->cartCount=Cart::where('user_id',\auth()->user()->id)->count();
        }else{
            return $this->cartCount=0;

        }
    }
    public function render()
    {
        $this->checkCartCount();
        return view('livewire.frontend.cart-count',[
            'cartCount'=>$this->cartCount,
        ]);
    }
}
