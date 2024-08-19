<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryList extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Category::take(4)->get();
    }
    public function render()
    {
        return view('livewire.admin.category.category-list');
    }
}
