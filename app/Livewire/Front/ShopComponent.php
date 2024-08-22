<?php

namespace App\Livewire\Front;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ShopComponent extends Component
{
    public $products;
    // public $selectedProduct;
    public $count;
    public $sortBy = 'price_desc';

//     public function selectProduct($productId)
// {

//     $this->selectedProduct = Product::with('category')
//         ->select('products.*',
//             DB::raw('ROUND((discount / price) * 100) as discount_percentage'),
//             DB::raw('(price - discount) as final_price')
//         )
//         ->findOrFail($productId);
// }
    public function mount()
    {
        $this->count = Product::count();
        $this->loadProducts();
    }

    public function updatedSortBy()
    {
        $this->loadProducts();
    }

    public function loadProducts()
    {
        $query = Product::with('category')
            ->select('products.*',
                DB::raw('ROUND((discount / price) * 100) as discount_percentage'),
                DB::raw('(price - discount) as final_price')
            );

        $sortOptions = [
            'price_desc' => ['price', 'desc'],
            'price_asc' => ['price', 'asc'],
            'name_asc' => ['name', 'asc'],
            'name_desc' => ['name', 'desc'],
            'date_asc' => ['created_at', 'asc'],
            'date_desc' => ['created_at', 'desc'],
        ];

        if (array_key_exists($this->sortBy, $sortOptions)) {
            [$column, $direction] = $sortOptions[$this->sortBy];
            $query->orderBy($column, $direction);
        }

        $this->products = $query->get();
    }

    public function render()
    {
        return view('livewire.front.shop-component');
    }
}
