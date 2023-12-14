<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="addBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBrandModalLabel">Add New Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="createBrand">
                <div class="modal-body">

                    <!-- Category Field -->
                    <div class="form-group">
                        <label for="name">Select category:</label>
                        <select wire:model.defer="category_id" id="" class="form-control form-select">
                            <option value="">select</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('name') <span style="color: red;">{{ $message }}</span> @enderror
                    </div>

                    <!-- Name Field -->
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" wire:model.defer="name" >
                        @error('name') <span style="color: red;">{{ $message }}</span> @enderror
                    </div>

                    <!-- Slug Field -->
                    <div class="form-group">
                        <label for="slug">Slug:</label>
                        <input type="text" class="form-control" wire:model.defer="slug">
                        @error('slug') <span style="color: red;">{{ $message }}</span> @enderror
                    </div>

                    <!-- Status Field -->
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <input type="checkbox" wire:model.defer="status">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Update Modal -->
<div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="updateBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBrandModalLabel">Update Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div wire:loading>
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
          <div wire:loading.remove>
              <form wire:submit.prevent="updateBrand">
                  <div class="modal-body">

                      <!-- Category Field -->
                      <div class="form-group">
                          <label for="name">Select category:</label>
                          <select wire:model.defer="category_id" id="" class="form-control form-select">
                              <option value="">select</option>
                              @foreach($categories as $category)
                                  <option value="{{$category->id}}">{{$category->name}}</option>
                              @endforeach
                          </select>
                          @error('name') <span style="color: red;">{{ $message }}</span> @enderror
                      </div>


                      <!-- Name Field -->
                      <div class="form-group">
                          <label for="name">Name:</label>
                          <input type="text" class="form-control" wire:model="name">
                          @error('name') <span style="color: red;">{{ $message }}</span> @enderror
                      </div>

                      <!-- Slug Field -->
                      <div class="form-group">
                          <label for="slug">Slug:</label>
                          <input type="text" class="form-control" wire:model="slug">
                          @error('slug') <span style="color: red;">{{ $message }}</span> @enderror
                      </div>

                      <!-- Status Field -->
                      <div class="form-group">
                          <label for="status">Status:</label>
                          <input type="checkbox" wire:model="status">
                      </div>

                  </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Update</button>
                  </div>
              </form>
          </div>
        </div>
    </div>
</div>

<!--Delete Modal -->
<div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="deleteBrandModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteBrandModal">Delete Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyBrand">
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
