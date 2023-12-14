@extends('layouts.admin')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{url('admin/product/'.$product->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Details</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">SEO tags</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image" type="button" role="tab" aria-controls="image" aria-selected="false">Product Image</button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="" class=" form-select">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected':''}}>
                                    {{$category->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" id="name" value="{{$product->name}}" name="name"
                        @error('name')
                        <span style="color: red;">{{ $message }}</span>
                        @enderror

                        >
                    </div>
                    <div class="form-group">
                        <label for="slug">Product Slug</label>
                        <input type="text" class="form-control" value="{{$product->slug}}" id="slug" name="slug"
                        @error('slug')
                        <span style="color: red;">{{ $message }}</span>
                        @enderror
                        >

                    </div>

                    <div class="form-group">
                        <label for="category_id">Select Brand</label>
                        <select name="brand" id="" class="form-select">
                            @foreach($brands as $brand)
                                <option value="{{$brand->name}}" {{$brand->name == $product->brand ? 'selected' : ''}}>
                                    {{$brand->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                    <div class="form-group">
                        <label for="description">Original Price</label>
                        <input type="number" class="form-control" value="{{$product->original_price}}" name="original_price"
                        @error('original_price')
                        <span style="color: red;">{{ $message }}</span>
                        @enderror

                        />
                    </div>

                    <div class="form-group">
                        <label for="description">Selling Price</label>
                        <input type="number" class="form-control" value="{{$product->selling_price}}" id="description" name="selling_price"
                        @error('selling_price')
                        <span style="color: red;">{{ $message }}</span>
                        @enderror

                        />
                    </div>
                    <div class="form-group">
                        <label for="description">Quantity</label>
                        <input type="number" class="form-control" value="{{$product->quantity}}" id="description" name="quantity"
                        @error('quantity')
                        <span style="color: red;">{{ $message }}</span>
                        @enderror

                        />
                    </div>
                    <div class="form-group">
                        <label for="description">Trending</label>
                        <input type="checkbox" class="form-check-info" value="{{$product->trending == '1' ? 'checked': ''}}" name="trending"
                        @error('trending')
                        <span style="color: red;">{{ $message }}</span>
                        @enderror

                        />
                    </div>

                    <div class="form-group">
                        <label for="description">Status</label>
                        <input type="checkbox" class="form-check-info" value="{{$product->status == '1' ? 'checked' : ''}}" name="status"
                        @error('status')
                        <span style="color: red;">{{ $message }}</span>
                        @enderror

                        />
                    </div>

                    <div class="form-group">
                        <label for="small_description">Small Description</label>
                        <input type="text" class="form-control" id="small_description" value="{{$product->small_description}}" name="small_description"
                        @error('small_description')
                        <span style="color: red;">{{ $message }}</span>
                        @enderror

                        />
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description"
                        @error('description')
                        <span style="color: red;">{{ $message }}</span>
                        @enderror

                        >{{$product->description}}</textarea>
                    </div>
                    <!-- Add more fields as needed -->

                </div>

                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" class="form-control" id="meta_title" value="{{$product->meta_title}}" name="meta_title"
                        @error('meta_title')
                        <span style="color: red;">{{ $message }}</span>
                        @enderror

                        >
                    </div>
                    <div class="form-group">
                        <label for="meta_keyword">Meta Keyword</label>
                        <input type="text" class="form-control" id="meta_keyword" value="{{$product->meta_keyword}}" name="meta_keyword"
                        @error('meta_keyword')
                        <span style="color: red;">{{ $message }}</span>
                        @enderror

                        >
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <textarea class="form-control" id="meta_description" name="meta_description"
                        @error('meta_description')
                        <span style="color: red;">{{ $message }}</span>
                        @enderror

                        >{{$product->meta_description}}</textarea>
                    </div>


                </div>

                <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">

                    <div class="form-group">
                        <label for="meta_title">Image</label>
                        <input type="file" class="form-control" id="" name="image[]" multiple
                        @error('image')
                        <span style="color: red;">{{ $message }}</span>
                        @enderror
                         >
                        @if($product->productImage)
                            @foreach($product->productImage as $image)
                                <img src="{{asset($image->image)}}" class="me-3 border" style="width: 80px; height: 80px" alt="">
                            @endforeach
                        @else
                            <h5>No Image Added</h5>
                        @endif
                    </div>

                </div>
            </div>
        </div>
        <div>
            <button class="btn btn-secondary" type="submit">Update</button>
        </div>
    </form>

@endsection
