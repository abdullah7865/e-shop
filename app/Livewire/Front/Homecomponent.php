<?php

namespace App\Livewire\Front;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Homecomponent extends Component
{
    public $products;
    public $sliders;

    public function mount()
    {
        $this->loadProducts();
        $this->loadSliders();
    }

    public function loadProducts()
    {
        $this->products = Product::with('category')
            ->select(
                'products.*',
                DB::raw('ROUND((discount / price) * 100) as discount_percentage'),
                DB::raw('(price - discount) as final_price')
            )
            ->latest()
            ->take(8)
            ->get();
    }

    public function loadSliders()
    {
        $this->sliders = Product::with('category')
            ->select(
                'products.*',
                DB::raw('ROUND((discount / price) * 100) as discount_percentage'),
                DB::raw('(price - discount) as final_price')
            )
            ->get();
    }

    public function render()
    {
        return view('livewire.front.homecomponent');
    }
}
