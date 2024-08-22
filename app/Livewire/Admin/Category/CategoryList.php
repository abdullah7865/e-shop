<?php

namespace App\Livewire\Admin\Category;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage as FacadesStorage;

class CategoryList extends Component
{
    use WithPagination;

    public function deleteCategory($categoryId)
    {
        $category = Category::find($categoryId);

        if ($category) {
            $imageArray = json_decode($category->files, true);
            if (!empty($imageArray)) {
                foreach ($imageArray as $image) {
                    FacadesStorage::delete('public/uploads/' . $image);
                }
            }
            $category->delete();

            $this->resetPage();

            $this->dispatch('swal', [
                'title' => 'Success!',
                'text' => 'Your category has been deleted.',
                'icon' => 'success',
            ]);
        }
    }

    public function render()
    {
        $categories = Category::paginate(10);
        foreach ($categories as $category) {
            $category->min_price = Product::where('category_id', $category->id)->min('price');
            $category->total_stock = Product::where('category_id', $category->id)->sum('stock');

        }

        return view('livewire.admin.category.category-list', [
            'categories' => $categories
        ]);
    }
}
