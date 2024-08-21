<?php

namespace App\Livewire\Admin\Product;

use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $productId;
    public $name;
    public $category_id;
    public $brand;
    public $weight;
    public $gender;
    public $selectedSizes = [];
    public $selectedColors = [];
    public $description;
    public $tag_number;
    public $stock;
    public $price;
    public $discount;
    public $tax;
    public $image;
    public $previews = [];
    public $categories;
    public $sizes;
    public $colors;
    public $tag = [];

    protected $rules = [
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'brand' => 'nullable|string|max:255',
        'weight' => 'nullable|numeric',
        'gender' => 'nullable|string',
        'selectedSizes' => 'nullable|array',
        'selectedColors' => 'nullable|array',
        'description' => 'nullable|string',
        'tag_number' => 'nullable|numeric',
        'stock' => 'nullable|numeric',
        'price' => 'required|numeric',
        'discount' => 'nullable|numeric',
        'tax' => 'nullable|numeric',
        'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ];

    public function mount()
    {
        $id = request()->route('id');
        $this->productId = $id;
        $this->loadProduct();
    }

    public function loadProduct()
    {
        $product = Product::find($this->productId);

        if ($product) {
            $this->name = $product->name;
            $this->category_id = $product->category_id;
            $this->brand = $product->brand;
            $this->weight = $product->weight;
            $this->gender = $product->gender;
            $this->selectedSizes = json_decode($product->sizes, true);
            $this->selectedColors = json_decode($product->colors, true);
            $this->description = $product->description;
            $this->tag_number = $product->tag_number;
            $this->stock = $product->stock;
            $this->price = $product->price;
            $this->discount = $product->discount;
            $this->tax = $product->tax;
            $this->previews = json_decode($product->images, true);
        }

        $this->categories = Category::all();
        $this->sizes = Size::all();
        $this->colors = Color::all();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id', // Ensure it's an integer
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
            'image.*' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:2048',
        ]);

        // Handle new images
        $imagePaths = $this->existingImages;
        if ($this->image) {
            foreach ($this->image as $file) {
                $imagePaths[] = $file->store('images', 'public');
            }
        }

        // Update the product
        $product = Product::findOrFail($this->productId);
        $product->update([
            'name' => $this->name,
            'category_id' => (int) $this->category_id,
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
