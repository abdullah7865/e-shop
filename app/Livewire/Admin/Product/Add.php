<?php

namespace App\Livewire\Admin\Product;

use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\Number;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Add extends Component
{
    use WithFileUploads;

    public $categories;
    public $sizes;
    public $numbers;
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
    public $selectedNumbers = [];
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
        $this->numbers = Number::all();
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
            'selectedNumbers' => 'array',
            'selectedColors' => 'array',
            'description' => 'nullable|string',
            'tag_number' => 'nullable|numeric',
            'stock' => 'required|nullable|numeric',
            'tag' => 'array',
            'price' => 'required|nullable|numeric',
            'discount' => 'required|numeric',
            'tax' => 'required|numeric',
            'image.*' => 'required|image|mimes:png,jpg,jpeg,gif|max:2048',
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
        }


        Product::create([
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
