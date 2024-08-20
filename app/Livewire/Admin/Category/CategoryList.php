<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Storage as FacadesStorage;

class CategoryList extends Component
{
    public $categories;
    public $allCategories;

    public function mount()
    {

        $this->allCategories = Category::all();
    }

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
            $this->dispatch('swal', [
                'title' => 'Success!',
                'text' => 'Your category has been deleted.',
                'icon' => 'success',
            ]);

            $this->allCategories = Category::all();
        }
    }
    public function render()
    {
        return view('livewire.admin.category.category-list');
    }
}
