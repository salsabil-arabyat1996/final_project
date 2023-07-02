<?php
namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use App\Models\Product;

class Index extends Component
{
    public $products, $category = [], $priceInput;
    protected $queryString = [
        'priceInput' => ['except' => '', 'as' => 'price']
    ];

    public function mount($category)
    {
        $this->category = $category;
    }

    public function render()
    {
        $categoryId = is_array($this->category) ? $this->category['id'] : $this->category->id;

        $query = Product::where('category_id', $categoryId)
            ->where('status', '0');

        if ($this->priceInput === 'high-to-low') {
            $query->orderBy('selling_price', 'desc');
        } elseif ($this->priceInput === 'low-to-high') {
            $query->orderBy('selling_price', 'asc');
        }

        $this->products = $query->get();

        return view('livewire.frontend.product.index', [
            'products' => $this->products,
            'category' => $this->category,
        ]);
    }
}
