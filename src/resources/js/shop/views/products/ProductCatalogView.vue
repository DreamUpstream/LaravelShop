<script setup>
import { reactive } from "vue";
const state = reactive({
    products: [],
    loading: true,
});
function loadProducts(url = "/api/products") {
    fetch(url, {
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
        },
    })
        .then((response) => response.json())
        .then((data) => {
            state.products = data.products;
        })
        .finally(() => {
            state.loading = false;
        });
}

loadProducts();

let productStorage = ROOT_URL + "/storage/img/products/";
</script>
<template>
    <div v-if="state.loading" class="d-flex justify-content-center">
        <div class="loader"></div>
    </div>

    <div class="container py-5">
        <div class="row d-flex justify-content-center">
            <!-- {{-- Categories sidebar --}}
            @include('products.categoriesSidebar')
            {{-- Categories sidebar --}} -->

            <div class="col-lg-9">
                <!-- {{-- Product filter top bar --}}
                @include('products.productFilterBar')
                {{-- Product filter top bar --}} -->
                <div class="row">
                    <div
                        class="col-md-4"
                        v-for="product in state.products"
                        :key="product.id"
                    >
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <!-- {{-- Photos --}} -->
                                <img
                                    class="card-img rounded-0 img-fluid"
                                    :src="productStorage + product.image"
                                />
                                <div
                                    class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center"
                                >
                                    <ul class="list-unstyled">
                                        <li>
                                            <router-link
                                                class="btn btn-success text-white"
                                                :to="{
                                                    name: 'products-manage',
                                                    params: {
                                                        id: product.id,
                                                    },
                                                }"
                                                ><i class="far fa-edit"></i
                                            ></router-link>
                                        </li>
                                        <li>
                                            <router-link
                                                class="btn btn-success text-white mt-2"
                                                :to="{
                                                    name: 'products-show',
                                                    params: {
                                                        name: product.name
                                                            .split(' ')
                                                            .join('-'),
                                                        id: product.id,
                                                    },
                                                }"
                                                ><i class="far fa-eye"></i
                                            ></router-link>
                                        </li>
                                        <li>
                                            <a
                                                class="btn btn-success text-white mt-2"
                                                href="#"
                                                ><i class="fas fa-cart-plus"></i
                                            ></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- {{-- Product name --}} -->
                                <a
                                    :href="product.url"
                                    class="h3 fw-bold text-decoration-none"
                                    >{{ product.name }}</a
                                >
                                <ul
                                    class="w-100 list-unstyled d-flex justify-content-between mb-0"
                                >
                                    <!-- {{-- Product brand --}} -->
                                    <li>{{ product.product_brand }}</li>
                                    <li class="pt-2">
                                        <span
                                            class="product-color-dot color-dot-red float-left rounded-circle ml-1"
                                        ></span>
                                        <span
                                            class="product-color-dot color-dot-blue float-left rounded-circle ml-1"
                                        ></span>
                                        <span
                                            class="product-color-dot color-dot-black float-left rounded-circle ml-1"
                                        ></span>
                                        <span
                                            class="product-color-dot color-dot-light float-left rounded-circle ml-1"
                                        ></span>
                                        <span
                                            class="product-color-dot color-dot-green float-left rounded-circle ml-1"
                                        ></span>
                                    </li>
                                </ul>
                                <ul
                                    class="list-unstyled d-flex justify-content-center mb-1"
                                >
                                    <li>
                                        <!-- {{-- Ratings --}} -->
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
                                    </li>
                                </ul>
                                <!-- {{-- Price --}} -->
                                <p class="text-center mb-0">
                                    {{ product.price }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- {{-- Pagination --}}
                @include('products.pagination')
                {{-- Pagination --}} -->
            </div>
        </div>
    </div>
</template>
