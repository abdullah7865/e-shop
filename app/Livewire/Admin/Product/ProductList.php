<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        $this->dispatch('swal', [
            'title' => 'Success!',
            'text' => 'Product deleted successfully.',
            'icon' => 'success',
        ]);

        $this->resetPage();
    }

    public function render()
    {
        $products = Product::with('category')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.admin.product.product-list', [
            'products' => $products
        ]);
    }
}
