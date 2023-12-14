<?php

namespace App\Livewire\Frontend\Products;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $products, $category, $brandInputs = [],$priceInput;

    protected $queryString = [
        'brandInputs'=>['except' => '', 'as' => 'brand'],
        'priceInput'=>['except' => '', 'as' => 'price'],
    ];


    public function mount($category)
    {
        $this->category = $category;
    }

    public function render()
    {


        $this->products = Product::where('category_id', $this->category->id)
            ->when($this->brandInputs, function ($query) {
                $query->whereIn('brand', $this->brandInputs);
            })
            ->where('status', '0')
            ->get();

        return view('livewire.frontend.products.index', [
            'products' => $this->products,
            'category' => $this->category,
        ]);
    }
}
