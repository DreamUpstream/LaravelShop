<script setup>
import { reactive } from "vue";
import axios from "axios";
import { useRoute } from "vue-router";
const state = reactive({
    loading: true,
    productImage: null,
});
const product = reactive({});

const route = useRoute();

if (route.params.id) {
    axios.get(`/api/products/find?id=${route.params.id}`).then((response) => {
        Object.assign(product, response.data.product);
        state.productImage = product.image;
        state.loading = false;
    });
}

let productStorage = ROOT_URL + "/storage/img/products/";
</script>
<template>
    <div v-if="state.loading" class="d-flex justify-content-center">
        <div class="loader"></div>
    </div>

    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img
                            class="card-img img-fluid"
                            :src="productStorage + state.productImage"
                            alt="Card image cap"
                            id="product-detail"
                        />
                    </div>
                    <div class="row">
                        <!-- Start Controls -->
                        <div class="col-1 align-self-center">
                            <a
                                href="#multi-item-example"
                                role="button"
                                data-bs-slide="prev"
                            >
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <!-- End Controls  -->
                        <!-- Start Carousel Wrapper -->
                        <div
                            id="multi-item-example"
                            class="col-10 carousel slide carousel-multi-item"
                            data-bs-ride="carousel"
                        >
                            <!-- Start Slides -->
                            <div
                                class="carousel-inner product-links-wap"
                                role="listbox"
                            >
                                <!-- First slide -->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img
                                                    class="card-img img-fluid"
                                                    :src="
                                                        productStorage +
                                                        state.productImage
                                                    "
                                                    alt="Product Image 1"
                                                />
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img
                                                    class="card-img img-fluid"
                                                    :src="
                                                        productStorage +
                                                        state.productImage
                                                    "
                                                    alt="Product Image 2"
                                                />
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img
                                                    class="card-img img-fluid"
                                                    :src="
                                                        productStorage +
                                                        state.productImage
                                                    "
                                                    alt="Product Image 3"
                                                />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- First slide -->
                            </div>
                            <!-- End Slides -->
                        </div>
                        <!-- End Carousel Wrapper -->
                        <!-- Start Controls -->
                        <div class="col-1 align-self-center">
                            <a
                                href="#multi-item-example"
                                role="button"
                                data-bs-slide="next"
                            >
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!-- End Controls -->
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h2">{{ product.name }}</h1>
                            <p class="h3 py-2">{{ product.price }}$</p>
                            <p class="py-2">
                                <!-- Ratings -->
                                <i
                                    class="text-warning fa fa-star"
                                    v-for="i in parseInt(
                                        product.product_rating
                                    )"
                                    :key="i"
                                ></i>
                                <i
                                    class="text-muted fa fa-star"
                                    v-for="i in 5 -
                                    parseInt(product.product_rating)"
                                    :key="i"
                                ></i>
                                <span class="list-inline-item text-dark"
                                    >Rating {{ product.product_rating }}</span
                                >
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Brand:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted">
                                        <strong>{{
                                            product.product_brand
                                        }}</strong>
                                    </p>
                                </li>
                            </ul>

                            <h6>Description:</h6>
                            <p>{{ product.description }}</p>
                            <!-- not implemented yet: -->
                            <form action="" method="GET">
                                <input
                                    type="hidden"
                                    name="product-title"
                                    value=""
                                />
                                <div class="row">
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li
                                                class="list-inline-item text-right"
                                            >
                                                Quantity
                                                <input
                                                    type="hidden"
                                                    name="product-quanity"
                                                    id="product-quanity"
                                                    value="1"
                                                />
                                            </li>
                                            <li class="list-inline-item">
                                                <span
                                                    class="btn btn-primary"
                                                    id="btn-minus"
                                                    >-</span
                                                >
                                            </li>
                                            <li class="list-inline-item">
                                                <span
                                                    class="badge bg-secondary"
                                                    id="var-value"
                                                    >1</span
                                                >
                                            </li>
                                            <li class="list-inline-item">
                                                <span
                                                    class="btn btn-primary"
                                                    id="btn-plus"
                                                    >+</span
                                                >
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col d-grid">
                                        <button
                                            type="submit"
                                            class="btn btn-success btn-lg"
                                            name="submit"
                                            value="buy"
                                        >
                                            Buy
                                        </button>
                                    </div>
                                    <div class="col d-grid">
                                        <button
                                            type="submit"
                                            class="btn btn-primary btn-lg"
                                            name="submit"
                                            value="addtocard"
                                        >
                                            Add To Cart
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Close Content -->
</template>
