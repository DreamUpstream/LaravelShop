<script setup>
import { reactive } from "vue";
const state = reactive({
    products: [],
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
            state.products = data;
        });
}
loadProducts();
</script>
<template>
    <h1>Products in json:</h1>
    <p>{{ state.products }}</p>
</template>
