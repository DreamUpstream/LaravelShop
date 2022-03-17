<!-- Open Content -->
<section class="bg-light">
    <div class="container pb-5">
        <div class="row">
            <div class="col-lg-5 mt-5">
                <div class="card mb-3">
                    <img class="card-img img-fluid" src="{{asset("storage/img/products/{$product->image}")}}" alt="Card image cap" id="product-detail">
                </div>
                <div class="row">
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class="text-dark fas fa-chevron-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                    </div>
                    <!--End Controls-->
                    <!--Start Carousel Wrapper-->
                    <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                        <!--Start Slides-->
                        <div class="carousel-inner product-links-wap" role="listbox">

                            <!--First slide-->
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="{{asset("storage/img/products/{$product->image}")}}" alt="Product Image 1">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="{{asset("storage/img/products/{$product->image}")}}" alt="Product Image 2">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="{{asset("storage/img/products/{$product->image}")}}" alt="Product Image 3">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--First slide-->

                            <!--Second slide-->
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="{{asset("storage/img/products/{$product->image}")}}" alt="Product Image 4">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="{{asset("storage/img/products/{$product->image}")}}" alt="Product Image 5">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#">
                                            <img class="card-img img-fluid" src="{{asset("storage/img/products/{$product->image}")}}" alt="Product Image 6">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--Second slide-->
                        </div>
                        <!--End Slides-->
                    </div>
                    <!--End Carousel Wrapper-->
                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class="text-dark fas fa-chevron-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!--End Controls-->
                </div>
            </div>
            <!-- col end -->
            <div class="col-lg-7 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h2">{{$product->name}}</h1>
                        <p class="h3 py-2">${{$product->price}}</p>
                        <p class="py-2">
                            {{-- Ratings --}}
                            @for($i = 0; $i < $product->product_rating; $i++)
                            <i class="text-warning fa fa-star"></i>
                            @endfor
                            @for($i = 0; $i < 5-$product->product_rating; $i++)
                            <i class="text-muted fa fa-star"></i>
                            @endfor 
                            <span class="list-inline-item text-dark">Rating {{$product->product_rating}}</span>
                        </p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <h6>Brand:</h6>
                            </li>
                            <li class="list-inline-item">
                                <p class="text-muted"><strong>{{$product->product_brand}}</strong></p>
                            </li>
                        </ul>

                        <h6>Description:</h6>
                        <p>{{$product->description}}</p>
                        {{-- not implemented yet: --}}
                        <form action="" method="GET"> 
                            <input type="hidden" name="product-title" value="">
                            <div class="row">
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        <li class="list-inline-item text-right">
                                            Quantity
                                            <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                                        </li>
                                        <li class="list-inline-item"><span class="btn btn-primary" id="btn-minus">-</span></li>
                                        <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                        <li class="list-inline-item"><span class="btn btn-primary" id="btn-plus">+</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col d-grid">
                                    <button type="submit" class="btn btn-success btn-lg" name="submit" value="buy">Buy</button>
                                </div>
                                <div class="col d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg" name="submit" value="addtocard">Add To Cart</button>
                                </div>
                            </div>
                        </form>
                        {{-- not implemented yet: --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Close Content -->

<!-- Start Related Products -->
<section class="py-5">
    <div class="container">
        <div class="row text-left p-2 pb-3">
            <h4>Related Products</h4>
        </div>
        <!--Start Carousel Wrapper-->
        <div id="carousel-related-product" class="row d-flex align-items-center justify-content-center">
            @php $counter = 0; @endphp
            @foreach ($relatedProducts as $relatedproduct)
                @if ($counter > 5)
                    @break
                @endif
                @php $counter++; @endphp
                <div class="p-2 pb-3 col-6">
                    <div class="product-wap card rounded-0">
                        <div class="card rounded-0">
                            <img class="card-img rounded-0 img-fluid" src="{{asset("storage/img/products/{$relatedproduct->image}")}}">
                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                <ul class="list-unstyled">
                                    <li><a class="btn btn-success text-white" href="{{$relatedproduct->url}}"><i class="far fa-heart"></i></a></li>
                                    <li><a class="btn btn-success text-white mt-2" href="{{$relatedproduct->url}}"><i class="far fa-eye"></i></a></li>
                                    <li><a class="btn btn-success text-white mt-2" href="{{$relatedproduct->url}}"><i class="fas fa-cart-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="{{$relatedproduct->url}}" class="h3 text-decoration-none">{{$relatedproduct->name}}</a>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
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
                                    @for($i = 0; $i < $relatedproduct->product_rating; $i++)
                                    <i class="text-warning fa fa-star"></i>
                                    @endfor
                                    @for($i = 0; $i < 5-$relatedproduct->product_rating; $i++)
                                    <i class="text-muted fa fa-star"></i>
                                    @endfor 
                                </li>
                            </ul>
                            <p class="text-center mb-0">{{$relatedproduct->price}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Article -->