<style>
.category-card{
    border: 1px solid #ddd;
    box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
    margin-bottom: 24px;
    background-color: #fff;
}
.category-card a{
    text-decoration: none;
}
.category-card .category-card-img{
    max-height: 260px;
    overflow: hidden;
    border-bottom: 1px solid #ccc;
}
.category-card .category-card-body{
    padding: 10px 16px;
}
.category-card .category-card-body h5{
    margin-bottom: 0px;
    font-size: 18px;
    font-weight: 600;
    color: #000;
    text-align: center;
}
/* Category End */
</style>


{{-- @extends('layouts.layout') --}}
{{-- @section('contect') --}}


<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Our Categories</h4>
            </div>
            @forelse ($categories as $categoryItem)


            <div class="col-6 col-md-3">
                <div class="category-card">
                    <a href="{{ route('collections.products', ['category_name' => $categoryItem->name, 'product_name' => $product->name]) }}">
                        <div class="category-card-img">
                            <img src="{{asset("$categoryItem->image")}}" class="w-100" alt="Laptop">
                        </div>
                        <div class="category-card-body">
                            <h5>{{$categoryItem->name}}</h5>
                        </div>
                    </a>
                </div>
            </div>
             @empty

             <div class="col-md-12">
                <h5>No category</h5>
             </div>
            @endforelse

        </div>
    </div>
</div>



{{--
@endsection --}}
