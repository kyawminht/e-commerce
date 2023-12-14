<?php

namespace App\Livewire\Frontend;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishlistCount extends Component
{
    public $wishlistCount;
    protected $listeners = ['removeOrAddedWishlist' => 'checkWishlistCount'];

    public function checkWishlistCount()
    {
        if (Auth::user()){
            return $this->wishlistCount=Wishlist::where('user_id',\auth()->user()->id)->count();
        }else{
            return $this->wishlistCount=0;
        }
    }
    public function render()
    {
        $this->wishlistCount=$this->checkWishlistCount();
        return view('livewire.frontend.wishlist-coutn',[
            'wishlistCount'=>$this->wishlistCount,
        ]);
    }
}
