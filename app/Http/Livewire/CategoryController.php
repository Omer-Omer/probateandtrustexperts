<?php

namespace App\Http\Livewire;

use App\Models\ProductCategory;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class CategoryController extends Component
{
    public $categories;
    public $updateMode = false;
    public $createMode = false;


    public function mount()
    {
        return $this->categories = ProductCategory::get();

    }

    public function index()
    {
        $this->categories = ProductCategory::get();
        // return $this->categories;
        return view('livewire.category_index', ['categories' => $this->categories, 'updateMode' => $this->updateMode, 'createMode' => $this->createMode]);
    }

    public function create() {
        $this->createMode = true;
        // return view('livewire.category.create');
    }

    public function store(Request $request) {

        $validatedDate = $this->validate([
            'name' => 'required',
        ]);

        ProductCategory::create($validatedDate);

        session()->flash('message', 'Category Created Successfully.');

        $this->resetInputFields();
    }

}
