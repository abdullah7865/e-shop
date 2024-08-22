<?php

namespace App\Livewire\Admin\Product;

use App\Models\Number;
use Livewire\Component;

class NumberComponent extends Component
{
    public $number = '';
    public $numbers;

    protected $rules = [
        'number' => 'required|string|max:255',
    ];

    public function addSize()
    {
        $this->validate();

        Number::create([
            'number' => $this->number,
        ]);

        $this->number = '';
        $this->dispatch('hide-modal');
        $this->dispatch('swal', [
            'title' => 'Success!',
            'text' => 'Number added successfully.',
            'icon' => 'success',
        ]);

        $this->numbers = Number::all();
    }

    public function mount()
    {
        $this->numbers = Number::all();
    }

    public function delete($id)
{
    $size = Number::findOrFail($id);
    $size->delete();

    $this->dispatch('swal', [
        'title' => 'Success!',
        'text' => 'Your size have been deleted.',
        'icon' => 'success',
    ]);

    $this->numbers = Number::all();
}
    public function render()
    {
        return view('livewire.admin.product.number-component');
    }
}
