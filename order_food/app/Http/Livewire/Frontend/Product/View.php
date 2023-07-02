<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class View extends Component
{

    public $category ,$product ,$quantityCount = 1;
    public function incrementQuantity()
    {
        $this->quantityCount++;
    }
    public function decrementQuantity()
    {
        // $this->quantityCount--;
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }




    public function mount($category,$product)
    {
   $this->category=$category;
   $this->product=$product;
 }

    public function render()
    {
        return view('livewire.frontend.product.view',[
            'category' => $this->category,
           'products' => $this->product
        ]);
    }
}
