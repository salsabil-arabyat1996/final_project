
 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"> 

<style>
    .product-view .product-name{
    font-size: 24px;
    color: #2874f0;
}
.product-view .product-name .label-stock{
    font-size: 13px;
    padding: 4px 13px;
    border-radius: 5px;
    color: #fff;
    box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
    float: right;
}
.product-view .product-path{
    font-size: 13px;
    font-weight: 500;
    color: #252525;
    margin-bottom: 16px;
}
.product-view .selling-price{
    font-size: 26px;
    color: #000;
    font-weight: 600;
    margin-right: 8px;
}
.product-view .original-price{
    font-size: 18px;
    color: #937979;
    font-weight: 400;
    text-decoration: line-through;
}
.product-view .btn1{
    border: 1px solid;
    margin-right: 3px;
    border-radius: 0px;
    font-size: 14px;
    margin-top: 10px;
}
.product-view .btn1:hover{
    background-color: #2874f0;
    color: #fff;
}
.product-view .input-quantity{
    border: 1px solid #000;
    margin-right: 3px;
    font-size: 12px;
    margin-top: 10px;
    width: 58px;
    outline: none;
    text-align: center;
}
/* .btn btn1{
    width: 200px;
} */
/* Product View */
    </style>

<div>
    <div class="py-3 py-md-5 ">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        @if($product->productImages)
                        <img src="{{asset($product->productImages[0]->image)}}" class="w-100" alt="Img">
                        @else
                        No Image Added
                        @endif

                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{$product->name}}
                            {{-- <label class="label-stock bg-success">In Stock</label> --}}
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{$product->Category->name }}/{{$product->name }}
                        </p>
                        <div>
                            <span class="selling-price">{{$product->selling_price }}</span>
                            <span class="original-price">{{$product->original_price }}</span>
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementQuantity"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantityCount"  value="{{$this->quantityCount}}" class="input-quantity" />
                                <span class="btn btn1" wire:click="incrementQuantity"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <a href="" class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</a>
                            {{-- <a href="" class="btn btn1"> <i class="fa fa-heart"></i> Add To Wishlist </a> --}}
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {!!$product->small_description !!}                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {!!$product->description !!}                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
