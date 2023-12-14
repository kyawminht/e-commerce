@extends('layouts.admin')

@section('content')
    <div>
        <div>


            <!-- Modal -->
            <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form wire:submit.prevent="destroyCategory">
                            <div class="modal-body">
                                <h5>Are you sure you want to delete this data</h5>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Yes. Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 ">
                    @if (session('message'))
                        <div class="alert alert-success">{{session('message')}}</div>
                    @endif
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h3>Products</h3>
                            <a href="{{url('admin/product/create')}}"  class="btn btn-primary">Add Product</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                    @forelse($products as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>
                                              @if( $product->category->name)
                                               {{$product->category->name}}
                                               @else
                                               No Category
                                               @endif
                                          </td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->selling_price}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td>{{$product->status == '1' ? 'Hidden': 'Visible'}}</td>
                                            <td>
                                                <a href="{{url('admin/product/'.$product->id.'/edit')}}" class="btn btn-success">Edit</a>
                                                <a href="{{url('admin/product/'.$product->id.'/delete')}}" class="btn btn-danger">Delete</a>
                                            </td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">No Product Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="">
                                {{$products->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @push('script')
            <script>
                window.addEventListener("close-modal",event=>{
                    $(`#deleteModal`).modal('hide');
                })
            </script>
        @endpush

    </div>
@endsection
