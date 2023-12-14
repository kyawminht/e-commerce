<?php

namespace App\Livewire\Admin\Brand;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component

{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $name,$slug,$status,$brand_id,$category_id;
    public function rules()
    {
        return [
            'name'=>'required:string',
            'slug'=>'required:string',
            'status'=>'nullable',
            'category_id'=>'required',

        ];
    }

    public function resteForm()
    {
        $this->name=Null;
        $this->slug=Null;
        $this->status=Null;
        $this->brand_id=Null;
        $this->category_id=Null;

    }
    public function createBrand()
    {
        $validatedData=$this->validate();
        Brand::create([
            'name'=>$this->name,
            'slug'=>Str::slug($this->slug),
            'status'=>$this->status == true ? '1' : '0',
            'category_id'=>$this->category_id,
        ]);
        session()->flash('message','Brand added successfully');
        $this->dispatch('close-modal');
        $this->resteForm();
    }

    public function editBrand($brand_id){
        $this->brand_id=$brand_id;
        $brand=Brand::findOrFail($brand_id);
        $this->name=$brand->name;
        $this->slug=$brand->slug;
        $this->status=$brand->status;
        $this->category_id=$brand->category_id;

    }

    public function updateBrand()
    {
        $validatedData=$this->validate();
        Brand::findOrFail($this->brand_id)->update([
            'name'=>$this->name,
            'slug'=>Str::slug($this->slug),
            'status'=>$this->status == true ? '1' : '0',
            'category_id'=>$this->category_id,
        ]);
        session()->flash('message','Brand updated successfully');
        $this->dispatch('close-modal');
        $this->resteForm();
    }

    public function deleteBrand($brand_id)
    {
        $this->brand_id=$brand_id;

    }

    public function destroyBrand(){
        Brand::findOrFail($this->brand_id)->delete();
        session()->flash('message','Brand deleted successfully');
        $this->dispatch('close-modal');
        $this->resteForm();
    }
    public function render()
    {
        $categories=Category::where('status','0')->get();
        $brands=Brand::orderBy('id')->paginate(5);
        return view('livewire.admin.brand.index',['brands'=>$brands, 'categories'=>$categories])
            ->extends('layouts.admin')
            ->section('content');
    }
}
