<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Product;

class Create extends Component
{
    use WithFileUploads;
    public $title;
    public $description;
    public $price;
    public $image;

    public function store() {
        $this->validate([
            'title' => 'required|min:3',
            'description' => 'required|max:100',
            'price' => 'required|numeric',
            'image' => 'image|max:1024'
        ]);
         $imageName = '';

        Product::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $imageName
        ]);

        
        if($this->image){
            $imageName = \Str::slug($this->title, '-')   
                . '-'
                . uniqid()
                . '.' . $this->image->getClientOriginalExtension();

                $this->image->storeAs('public', $imageName, 'local');
        }
        $this->emit('productStored');
    }



  

    public function render()
    {
        return view('livewire.product.create');
    }
}
