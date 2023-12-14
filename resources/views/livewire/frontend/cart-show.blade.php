<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            @if ($cart)
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

                            @php
                                $totalPrice = 0; // Initialize the total price before the loop
                            @endphp

                            @foreach($cart as $item)
                                @if($item->product)
                                    <div class="cart-item">
                                        <div class="row">
                                            <div class="col-md-6 my-auto">
                                                <a href="{{ url('collection/'.$item->product->category->slug.'/'.$item->product->slug) }}">
                                                    <label class="product-name">
                                                        <img src="{{ $item->product->productImage[0]->image }}" style="width: 50px; height: 50px" alt="{{ $item->product->productImage[0]->name }}">
                                                        {{ $item->product->name }}
                                                    </label>
                                                </a>
                                            </div>
                                            <div class="col-md-2 my-auto">
                                                <label class="price">${{ $item->product->selling_price }}</label>
                                                @php $totalPrice += $item->product->selling_price @endphp
                                            </div>
                                            <div class="col-md-2 col-5 my-auto">
                                                <div class="remove">
                                                    <button wire:click="removeCart({{ $item->id }})" wire:loading.attr="disabled" wire:target="removeCart({{ $item->id }})" class="btn btn-danger btn-sm">
                                                        <span wire:loading><i class="fa fa-trash"></i> Removing...</span>
                                                        <span wire:loading.remove><i class="fa fa-trash"></i> Remove</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-8">
                        <h6>Get the best deals and offers
                            <a href="{{ url('/collection') }}" class="btn btn-success">Shop Now</a>
                        </h6>
                    </div>
                    <div class="col-md-4">
                        <h4>Total:  <span class="float-end">${{ number_format($totalPrice, 2) }}</span></h4>
                        <hr>
                        <a href="{{ url('/checkout') }}" class="btn btn-primary w-100">Checkout</a>
                    </div>
                </div>

            @else
                <div class="row text-center">
                    <h5>No cart added</h5>
                </div>
            @endif
        </div>
    </div>
</div>
