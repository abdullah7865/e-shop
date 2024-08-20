<?php

namespace App\Livewire\Admin\Product;

use App\Models\Size as ModelsSize;
use Livewire\Component;

class SizeComponent extends Component
{
    public $sizeLabel = '';
    public $sizes;

    protected $rules = [
        'sizeLabel' => 'required|string|max:255',
    ];

    public function addSize()
    {
        $this->validate();

        ModelsSize::create([
            'size_label' => $this->sizeLabel,
        ]);

        $this->sizeLabel = '';
        $this->dispatch('hide-modal');
        $this->dispatch('swal', [
            'title' => 'Success!',
            'text' => 'Size added successfully.',
            'icon' => 'success',
        ]);

        $this->sizes = ModelsSize::all();
    }

    public function mount()
    {
        $this->sizes = ModelsSize::all();
    }

    public function delete($id)
{
    $size = ModelsSize::findOrFail($id);
    $size->delete();

    $this->dispatch('swal', [
        'title' => 'Success!',
        'text' => 'Your size have been deleted.',
        'icon' => 'success',
    ]);

    $this->sizes = ModelsSize::all();
}

    public function render()
    {
        return view('livewire.admin.product.size', [
           'sizes' => $this->sizes,
        ]);
    }
}
