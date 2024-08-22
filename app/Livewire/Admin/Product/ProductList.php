<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;

class ProductList extends Component
{
    public $products;
    public function mount()
    {
        $this->products = Product::with('category')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        $this->dispatch('swal', [
            'title' => 'Success!',
            'text' => 'Product deleted successfully.',
            'icon' => 'success',
        ]);

        $this->products = Product::with('category')
            ->orderBy('created_at', 'desc')
            ->get();
    }
    public function render()
    {

        return view('livewire.admin.product.product-list');
    }
}
