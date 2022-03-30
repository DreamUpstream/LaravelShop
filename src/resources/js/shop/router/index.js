import { createRouter, createWebHistory } from "vue-router";

// import ProductListView from '../views/products/ProductListView.vue';
// import ProductManageView from '../views/products/ProductManageView.vue';

const ProductCatalogView = () =>
    import("../views/products/ProductCatalogView.vue");
const ProductManageView = () =>
    import("../views/products/ProductManageView.vue");
const ProductPageView = () => import("../views/products/ProductPageView.vue");

const router = createRouter({
    history: createWebHistory("/shop"),
    routes: [
        {
            path: "/",
            name: "products-index",
            component: ProductCatalogView,
        },

        {
            path: "/products/:name/:id",
            name: "products-show",
            component: ProductPageView,
        },

        {
            path: "/products/manage/:id?",
            name: "products-manage",
            component: ProductManageView,
        },
    ],
});

export default router;
