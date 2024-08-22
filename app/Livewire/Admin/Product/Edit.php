<?php

namespace App\Livewire\Admin\Product;

use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Number;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $product;
    public $categories;
    public $sizes;
    public $numbers;
    public $colors = [];
    public $selectedColors = [];
    public $selectedNumbers = [];
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
        $id = request()->route('id');
        $this->product = Product::findOrFail($id);
        $this->name = $this->product->name;
        $this->category_id = $this->product->category_id;
        $this->brand = $this->product->brand;
        $this->weight = $this->product->weight;
        $this->gender = $this->product->gender;
        $this->selectedSizes = json_decode($this->product->sizes, true);
        $this->selectedNumbers = json_decode($this->product->numbers, true);
        $this->selectedColors = json_decode($this->product->colors, true);
        $this->description = $this->product->description;
        $this->tag_number = $this->product->tag_number;
        $this->stock = $this->product->stock;
        $this->tag = json_decode($this->product->tag, true);
        $this->price = $this->product->price;
        $this->discount = $this->product->discount;
        $this->tax = $this->product->tax;

        $this->categories = Category::all();
        $this->sizes = Size::all();
        $this->numbers = Number::all();
        $this->colors = array_map(function ($color) {
            return [
                'color_name' => $color,
                'color_class' => $this->colorClasses[$color] ?? 'text-muted',
            ];
        }, Color::pluck('color_name')->toArray());

        $this->previews = array_map(function ($path) {
            return asset('storage/' . $path);
        }, json_decode($this->product->images, true));
    }

    public function updatedImage()
    {
        $this->validate([
            'image.*' => 'image|max:1024',
        ]);

        $this->previews = [];
        foreach ($this->image as $file) {
            $this->previews[] = $file->temporaryUrl();
        }
    }

    public function updateProduct()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'brand' => 'nullable|string|max:255',
            'weight' => 'nullable|numeric',
            'gender' => 'nullable|in:Men,Women,Other',
            'selectedSizes' => 'array',
            'selectedNumbers' => 'array',
            'selectedColors' => 'array',
            'description' => 'nullable|string',
            'tag_number' => 'nullable|numeric',
            'stock' => 'required|numeric',
            'tag' => 'array',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'tax' => 'required|numeric',
            'image.*' => 'image|mimes:png,jpg,jpeg,gif|max:2048',
        ]);

        $errors = [];

        if ($this->discount > $this->price) {
            $errors['discount'] = 'Discount cannot be greater than the price.';
        }

        if ($this->tax > $this->price) {
            $errors['tax'] = 'Tax cannot be greater than the price.';
        }

        if (($this->discount + $this->tax) > $this->price) {
            $errors['discount_and_tax'] = 'The discount and tax cannot be greater than the price.';
        }

        if (!empty($errors)) {
            foreach ($errors as $key => $error) {
                $this->addError($key, $error);
            }
            return;
        }
        $gender = $this->gender === '' ? null : $this->gender;

        $imagePaths = [];
        if ($this->image) {
            foreach ($this->image as $file) {
                $imagePaths[] = $file->store('images', 'public');
            }
            $validatedData['images'] = json_encode($imagePaths);
        }

        $this->product->update([
            'name' => $this->name,
            'category_id' => $this->category_id,
            'brand' => $this->brand,
            'weight' => $this->weight,
            'gender' => $gender,
            'sizes' => json_encode($this->selectedSizes),
            'numbers' => json_encode($this->selectedNumbers),
            'colors' => json_encode($this->selectedColors),
            'description' => $this->description,
            'tag_number' => $this->tag_number,
            'stock' => $this->stock,
            'tag' => json_encode($this->tag),
            'price' => $this->price,
            'discount' => $this->discount,
            'tax' => $this->tax,
            'images' => $validatedData['images'] ?? $this->product->images,
        ]);

        $this->dispatch('swal', [
            'title' => 'Success!',
            'text' => 'Product updated successfully.',
            'icon' => 'success',
        ]);

        return redirect()->route('product.list');
    }


    public function render()
    {
        return view('livewire.admin.product.edit');
    }
}
