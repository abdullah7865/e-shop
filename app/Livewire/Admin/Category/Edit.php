<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $categoryId;
    public $title;
    public $createdBy;
    public $tagId;
    public $description;
    public $metaTitle;
    public $metaTag;
    public $metaDescription;
    public $files = [];
    public $previews = [];
    public $existingFiles = [];

    public function mount()
    {
        $id = request()->route('id');
        $category = Category::findOrFail($id);

        $this->categoryId = $category->id;
        $this->title = $category->title;
        $this->createdBy = $category->created_by;
        $this->tagId = $category->tag_id;
        $this->description = $category->description;
        $this->metaTitle = $category->meta_title;
        $this->metaTag = $category->meta_tag;
        $this->metaDescription = $category->meta_description;
        $this->existingFiles = json_decode($category->files, true) ?? [];
        $this->previews = array_map(fn($file) => asset('storage/uploads/' . $file), $this->existingFiles);
    }

    public function updatedFiles()
    {
        $this->validate([
            'files.*' => 'image|max:1024',
        ]);

        foreach ($this->files as $file) {
            $this->previews[] = $file->temporaryUrl();
        }
    }

    public function update()
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

        $fileNames = $this->existingFiles;

        foreach ($this->files as $file) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $fileName, 'public');
            $fileNames[] = $fileName;
        }

        $category = Category::findOrFail($this->categoryId);
        $category->update([
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
            'text' => 'Category updated successfully.',
            'icon' => 'success',
        ]);

        return redirect()->route('category.list');
    }
    public function render()
    {
        return view('livewire.admin.category.edit');
    }
}
