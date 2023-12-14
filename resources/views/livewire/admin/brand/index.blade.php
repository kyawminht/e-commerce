<div>
    @include('livewire.admin.brand.modalForm')
    <div class="row">
        <div class="col-md-12 ">
            @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Brands</h3>
                    <a href=""  data-bs-toggle="modal" data-bs-target="#addBrandModal" class="btn btn-primary">Add Brands</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <th>ID</th>
                        <th>Brand Name</th>
                        <th>Category</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($brands as $brand)
                                <tr>
                                    <td>{{$brand->id}}</td>
                                    <td>{{$brand->name}}</td>
                                    <td>
                                       @if($brand->category)
                                           {{$brand->category->name}}
                                        @else
                                           No brand
                                        @endif
                                    </td>
                                    <td>{{$brand->slug}}</td>
                                    <td>{{$brand->status == '1' ? 'Hidden': 'Visible'}}</td>
                                    <td>
                                        <a href="" wire:click="editBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#updateBrandModal" class="btn btn-secondary">Edit</a>
                                        <a href="" wire:click="deleteBrand({{$brand->id}})" data-bs-toggle="modal"  data-bs-target="#deleteBrandModal" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">No brands Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{$brands->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        window.addEventListener("close-modal",event=>{
            $(`#addBrandModal`).modal('hide');
            $(`#updateBrandModal`).modal('hide');
            $(`#deleteBrandModal`).modal('hide');

        })
    </script>
@endpush

