<script setup>
import { reactive } from "vue";
const state = reactive({
    products: [],
});
function loadProducts(url = "/api/v1/products") {
    fetch(url)
        .then((response) => response.json())
        .then((data) => {
            state.products = data;
        });
}
loadProducts();
</script>
<template>
    <h1>Welcome to Vue.js branch</h1>
</template>
