<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class Add extends Component
{
    use WithFileUploads;

    public $title;
    public $createdBy;
    public $tagId;
    public $description;
    public $metaTitle;
    public $metaTag;
    public $metaDescription;
    public $files = [];

    public function save()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'createdBy' => 'required|string',
            'tagId' => 'required|numeric',
            'description' => 'nullable|string',
            'metaTitle' => 'nullable|string|max:255',
            'metaTag' => 'nullable|string|max:255',
            'metaDescription' => 'nullable|string',
            'files.*' => 'image|max:1024',
        ]);

        $fileNames = [];

        foreach ($this->files as $file) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $fileName, 'public');
            $fileNames[] = $fileName;
        }

        Category::create([
            'title' => $this->title,
            'created_by' => $this->createdBy,
            'tag_id' => $this->tagId,
            'description' => $this->description,
            'meta_title' => $this->metaTitle,
            'meta_tag' => $this->metaTag,
            'meta_description' => $this->metaDescription,
            'files' => json_encode($fileNames),
        ]);

        $this->dispatch('swal', [
            'title' => 'Success!',
            'text' => 'Category added successfully.',
            'icon' => 'success',
        ]);

        return redirect()->route('category.list');

    }

    public function render()
    {
        return view('livewire.admin.category.add');
    }
}
