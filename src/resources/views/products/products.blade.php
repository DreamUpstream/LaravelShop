<div class="container py-5">
    <div class="row">
  
        {{-- Categories sidebar --}}
        @include('products.categoriesSidebar')
        {{-- Categories sidebar --}}
  
        <div class="col-lg-9">
            {{-- Product filter top bar --}}
            @include('products.productFilterBar')
            {{-- Product filter top bar --}}
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                {{-- Photos --}}
                                <img class="card-img rounded-0 img-fluid" src="{{asset("storage/img/products/{$product->image}")}}">
                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="#"><i class="far fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="#"><i class="far fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="#"><i class="fas fa-cart-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- Product name --}}
                                <a href="#" class="h3 fw-bold text-decoration-none">{{$product->name}}</a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    {{-- Product brand --}}
                                    <li>{{$product->productBrand}}</li>
                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>
                                <ul class="list-unstyled d-flex justify-content-center mb-1">
                                    <li>
                                        {{-- Ratings --}}
                                        @for($i = 0; $i < $product->productRating; $i++)
                                        <i class="text-warning fa fa-star"></i>
                                        @endfor
                                        @for($i = 0; $i < 5-$product->productRating; $i++)
                                        <i class="text-muted fa fa-star"></i>
                                        @endfor 
                                    </li>
                                </ul>
                                {{-- Price --}}
                                <p class="text-center mb-0">${{$product->price}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- Pagination --}}
            @include('products.pagination')
            {{-- Pagination --}}
        </div>
    </div>
</div>