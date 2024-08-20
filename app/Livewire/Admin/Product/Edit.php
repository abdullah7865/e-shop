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
        $this->validate();

        $product = Product::find($this->productId);

        if ($product) {
            $product->update([
                'name' => $this->name,
                'category_id' => $this->category_id,
                'brand' => $this->brand,
                'weight' => $this->weight,
                'gender' => $this->gender,
                'description' => $this->description,
                'tag_number' => $this->tag_number,
                'stock' => $this->stock,
                'price' => $this->price,
                'discount' => $this->discount,
                'tax' => $this->tax,
            ]);

            $product->sizes()->sync($this->selectedSizes);
            $product->colors()->sync($this->selectedColors);

            if ($this->image) {
                foreach ($this->image as $img) {
                    $imagePath = $img->store('products', 'public');
                    $product->images()->create(['path' => $imagePath]);
                }
            }
        }

        $this->dispatch('swal', [
            'title' => 'Success!',
            'text' => 'Category updated successfully.',
            'icon' => 'success',
        ]);

        return redirect()->route('product.list');
    }

    public function render()
    {
        return view('livewire.admin.product.edit');
    }
}
