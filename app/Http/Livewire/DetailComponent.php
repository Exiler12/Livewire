<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class DetailComponent extends Component
{
    public $slug;
    use WithPagination;
    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $rproducts = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get();
        $newProducts = Product::latest()->paginate(3);
        return view('livewire.detail-component',['product'=>$product,'newProducts'=>$newProducts,'rproducts'=>$rproducts]);
    }
}
