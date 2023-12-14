<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">

                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>
                        @forelse($wishlist as $item)
                            @if($item->product)
                            <div class="cart-item">
                                <div class="row">
                                    <div class="col-md-6 my-auto">
                                        <a href="{{url('collection/'.$item->product->category->slug.'/'.$item->product->slug)}}">
                                            <label class="product-name">
                                                <img src="{{$item->product->productImage[0]->image}}" style="width: 50px; height: 50px" alt="{{$item->product->productImage[0]->name}}">
                                                {{$item->product->name}}
                                            </label>
                                        </a>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <label class="price">${{$item->product->selling_price}} </label>
                                    </div>
                                    <div class="col-md-2 col-5 my-auto">
                                            <div class="remove">
                                                <button wire:click="removeWishlist({{$item->id}})" wire:loading.attr="disabled" wire:target="removeWishlist({{$item->id}})" class="btn btn-danger btn-sm">
                                                    <span wire:loading><i class="fa fa-trash"></i> Removing...</span>
                                                    <span wire:loading.remove><i class="fa fa-trash"></i> Remove</span>
                                                </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @empty
                            <h5>No Wishlist Added</h5>
                        @endforelse


                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
