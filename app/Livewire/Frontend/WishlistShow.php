<?php

namespace App\Livewire\Frontend;

use App\Models\Wishlist;
use Livewire\Component;

class WishlistShow extends Component
{
    public function removeWishlist($wishlistId)
    {
        Wishlist::where('user_id',auth()->user()->id)->where('id',$wishlistId)->delete();
        $this->dispatch('removeOrAddedWishlist');
        $this->dispatch('message',[
            'text'=>'Wishlist remove successfully',
        ]);
    }
    public function render()
    {
        $wishlist=Wishlist::where('user_id',auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show',[
            'wishlist'=>$wishlist,
        ]);
    }
}
