<script setup>
import { createApp, reactive } from "vue";
import { QuillEditor } from "@vueup/vue-quill";
import "@vueup/vue-quill/dist/vue-quill.snow.css";

const app = createApp();
app.component("QuillEditor", QuillEditor);

const state = reactive({
    name: "",
    product_brand: "",
    is_active: false,
    description: null,
    category_id: null,
    product_rating: 3,
    errorMessage: "",
    SKU: null,
    price: null,
    image: null,
    loading: false,
});

function processInfo() {
    if (state.description) {
        state.description = JSON.stringify(state.description);
    }
    let formData = new FormData();
    formData.append("name", state.name);
    formData.append("category_id", state.category_id);
    formData.append("description", state.description);
    formData.append("price", state.price);
    formData.append("image", document.querySelector("#formFile").files[0]);
    formData.append("product_brand", state.product_brand);
    formData.append("is_active", +state.is_active);
    formData.append("product_rating", state.product_rating);
    formData.append("SKU", state.SKU);
    return formData;
}

function postProduct() {
    state.loading = true;
    let formData = processInfo();
    (async () => {
        const rawResponse = await fetch(
            "http://localhost:8085/api/products/store",
            {
                method: "POST",
                headers: {
                    Accept: "Application/json",
                },
                body: formData,
            }
        );
        const content = await rawResponse.json();
        state.loading = false;
        state.errorMessage = content;
    })();
}
</script>
<template>
    <h2 class="mb-5 mt-5 d-flex justify-content-center">Product creator</h2>

    <div class="mb-3">
        <label for="productName" class="form-label"> Name </label>
        <input class="form-control" id="productName" v-model="state.name" />
    </div>

    <div class="mb-3">
        <label for="productBrand" class="form-label"> Product brand </label>
        <input
            class="form-control"
            id="productBrand"
            v-model="state.product_brand"
        />
    </div>

    <div class="mb-3">
        <label for="productSKU" class="form-label"> SKU </label>
        <input
            class="form-control"
            id="productSKU"
            type="number"
            v-model="state.SKU"
        />
    </div>

    <div class="mb-3">
        <label for="productPrice" class="form-label"> Price </label>
        <input
            class="form-control"
            id="productPrice"
            type="number"
            v-model="state.price"
        />
    </div>

    <div class="mb-3">
        <label class="form-check-label mb-1"> Category </label>
        <div class="form-check">
            <input
                class="form-check-input"
                type="radio"
                name="menWomenRadio"
                id="menRadio"
                value="1"
                v-model="state.category_id"
            />
            <label class="form-check-label" for="menRadio"> Men </label>
        </div>
        <div class="form-check">
            <input
                class="form-check-input"
                type="radio"
                name="menWomenRadio"
                id="womenRadio"
                value="2"
                v-model="state.category_id"
            />
            <label class="form-check-label" for="womenRadio"> Women </label>
        </div>
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">Upload product image</label>
        <input class="form-control" type="file" id="formFile" />
    </div>

    <div class="mb-3">
        <label class="form-label" for="richText">Description</label>
        <QuillEditor
            class="mb-3"
            id="richText"
            v-model:content="state.description"
            theme="snow"
        />
    </div>

    <div class="mb-3">
        <label for="productRating" class="form-label">Product rating</label>
        <input
            type="range"
            min="1"
            max="5"
            step="1"
            class="form-range"
            id="productRating"
            v-model="state.product_rating"
        />
        <div class="d-flex justify-content-center fs-5 fw-bold">
            <span v-for="i in parseInt(state.product_rating)" :key="i">
                ☆
            </span>
        </div>
    </div>

    <div class="mb-3 form-check">
        <input
            type="checkbox"
            class="form-check-input"
            id="activeCheck"
            v-model="state.is_active"
        />
        <label class="form-check-label" for="activeCheck">Active</label>
    </div>

    <button @click="postProduct" class="btn btn-primary mb-3">Submit</button>
    <div class="d-flex justify-content-center">
        <div v-if="state.loading" class="loader"></div>
        <h4>
            {{ state.errorMessage.message }}
        </h4>
    </div>
</template>

<style scoped>
.loader {
    border: 16px solid #f3f3f3; /* Light grey */
    border-top: 16px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 60px;
    height: 60px;
    animation: spin 2s linear infinite;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
</style>
