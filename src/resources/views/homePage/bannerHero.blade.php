<div id="codeshop-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#codeshop-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#codeshop-hero-carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#codeshop-hero-carousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="{{asset('storage/img/banner_img_01.jpg')}}" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left align-self-center">
                            <h1 class="h1 text-dark"><b>CodeShop</b> store</h1>
                            <h3 class="h2">Your go to place for coder clothing</h3>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem molestias fugit aut soluta, excepturi corrupti, ex cum omnis nam commodi veritatis
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="{{asset('storage/img/banner_img_02.jpg')}}" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1">Proident occaecat</h1>
                            <h3 class="h2">Aliquip ex ea commodo consequat</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro eligendi quaerat unde sint iste impedit ipsum corrupti minus, blanditiis deserunt voluptas. Voluptatum nemo, repellendus maxime illum dolorem fuga sunt quas!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="{{asset('storage/img/banner_img_03.jpg')}}" alt="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1">Repr in voluptate</h1>
                            <h3 class="h2">Ullamco laboris nisi ut </h3>
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aut labore placeat animi repellendus rem unde consequuntur perspiciatis doloribus reprehenderit fuga distinctio beatae assumenda cupiditate aliquam aspernatur quam deserunt, reiciendis iste!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#codeshop-hero-carousel" role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#codeshop-hero-carousel" role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
    </a>
</div>

@push('scripts')
    {{-- <script src="/example.js"></script> --}}
@endpush