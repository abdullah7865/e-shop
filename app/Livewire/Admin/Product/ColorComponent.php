<?php

namespace App\Livewire\Admin\Product;

use App\Models\Color;
use Livewire\Component;

class ColorComponent extends Component
{

    public $color_name = '';
    public $colors;

    protected $rules = [
        'color_name' => 'required|string|max:255',
    ];

    public function addSize()
    {
        $this->validate();

        Color::create([
            'color_name' => $this->color_name,
        ]);

        $this->color_name = '';
        $this->dispatch('hide-modal');
        $this->dispatch('swal', [
            'title' => 'Success!',
            'text' => 'Size added successfully.',
            'icon' => 'success',
        ]);

        $this->colors = Color::all();
    }

    public function mount()
    {
        $this->colors = Color::all();
    }

    public function delete($id)
{
    $color = Color::findOrFail($id);
    $color->delete();

    $this->dispatch('swal', [
        'title' => 'Success!',
        'text' => 'Your size have been deleted.',
        'icon' => 'success',
    ]);

    $this->colors = Color::all();
}
    public function render()
    {
        return view('livewire.admin.product.color-component');
    }
}
