<?php

namespace App\Livewire\Admin\Product;

use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Add extends Component
{
    use WithFileUploads;

    public $categories;
    public $sizes;
    public $colors = [];
    public $selectedColors = [];
    public $previews = [];
    public $image = [];
    public $name;
    public $category_id;
    public $brand;
    public $weight;
    public $gender;
    public $selectedSizes = [];
    public $description;
    public $tag_number;
    public $stock;
    public $tag = [];
    public $price;
    public $discount;
    public $tax;

    protected $colorClasses = [
        'Dark' => 'text-dark',
        'Yellow' => 'text-warning',
        'White' => 'text-white',
        'Red' => 'text-primary',
        'Green' => 'text-success',
        'Blue' => 'text-danger',
        'Sky' => 'text-info',
        'Gray' => 'text-secondary',
    ];

    public function mount()
    {
        $colorsFromDb = Color::pluck('color_name')->toArray();

        $this->colors = array_map(function ($color) {
            return [
                'color_name' => $color,
                'color_class' => $this->colorClasses[$color] ?? 'text-muted',
            ];
        }, $colorsFromDb);

        $this->categories = Category::all();
        $this->sizes = Size::all();
    }

    public function updatedimage()
    {
        $this->validate([
            'image.*' => 'image|max:1024',
        ]);

        $this->previews = [];
        foreach ($this->image as $file) {
            $this->previews[] = $file->temporaryUrl();
        }
    }

    public function save()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'brand' => 'nullable|string|max:255',
            'weight' => 'nullable|numeric',
            'gender' => 'nullable|in:Men,Women,Other',
            'selectedSizes' => 'array',
            'selectedColors' => 'array',
            'description' => 'nullable|string',
            'tag_number' => 'nullable|numeric',
            'stock' => 'required|nullable|numeric',
            'tag' => 'array',
            'price' => 'required|nullable|numeric',
            'discount' => 'nullable|numeric',
            'tax' => 'nullable|numeric',
            'image.*' => 'required|image|mimes:png,jpg,jpeg,gif|max:2048',
        ]);


        $imagePaths = [];
        if ($this->image) {
            foreach ($this->image as $file) {
                $imagePaths[] = $file->store('images', 'public');
            }
        }


        Product::create([
            'name' => $this->name,
            'category_id' => $this->category_id,
            'brand' => $this->brand,
            'weight' => $this->weight,
            'gender' => $this->gender,
            'sizes' => json_encode($this->selectedSizes),
            'colors' => json_encode($this->selectedColors),
            'description' => $this->description,
            'tag_number' => $this->tag_number,
            'stock' => $this->stock,
            'tag' => json_encode($this->tag),
            'price' => $this->price,
            'discount' => $this->discount,
            'tax' => $this->tax,
            'images' => json_encode($imagePaths),
        ]);


        $this->dispatch('swal', [
            'title' => 'Success!',
            'text' => 'Product added successfully.',
            'icon' => 'success',
        ]);

        return redirect()->route('product.list');

    }
    public function render()
    {
        return view('livewire.admin.product.add');
    }
}
