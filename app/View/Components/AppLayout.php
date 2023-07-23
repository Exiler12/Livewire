<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public $slug;
    
    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render(): View
    {
        $product = Product::where('slug', $this->slug)->first();
        return view('layouts.app',['product' => $product]);
    }
}
