<div>
    <div class="row">
        <div class="col-md-3">
           @if($category->brands)
                <div class="card">
                    <div class="card-header">Brands</div>
                    <div class="card-body">
                        @foreach($category->brands as $brand)
                            <label for="" class="d-block">
                                <input type="checkbox" wire:model="brandInputs" id="" value="{{ $brand->name }}">
                                {{ $brand->name }}
                            </label>
                        @endforeach

                    </div>
                </div>
           @endif

               <div class="card mt-3">
                   <div class="card-header">Price</div>
                   <div class="card-body">
                           <label for="" class="d-block">
                               <input type="radio" name="priceSort" wire:model="priceInput" value="high-to-low"  > High to Low
                           </label>
                       <label for="" class="d-block">
                           <input type="radio" name="priceSort" wire:model="priceInput" value="low-to-high" > Low to Hight
                       </label>
                   </div>
               </div>
        </div>
        <div class="col-md-9">
            <div class="row">
                @forelse($products as $product)
                    <div class="col-md-4">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if($product->quantity > 0)
                                    <label class="stock bg-success">In Stock</label>
                                @else
                                    <label class="stock bg-danger">Out of Stock</label>
                                @endif

                                @if($product->productImage->count() >0)
                                    <a href="{{url('collection/'.$product->category->slug.'/'.$product->slug)}}">
                                        <img src="{{asset($product->productImage[0]->image)}}" alt="{{$product->name}}">
                                    </a>
                                @endif

                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{$product->brand}}</p>
                                <h5 class="product-name">
                                    <a href="{{url('collection/'.$product->category->slug.'/'.$product->slug)}}">
                                        {{$product->name}}
                                    </a>
                                </h5>
                                <div>
                                    <span class="selling-price">$ {{$product->selling_price}}</span>
                                    <span class="original-price">$ {{$product->original_price}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <h4>No products avaliable for {{$category->name}}</h4>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

</div>
