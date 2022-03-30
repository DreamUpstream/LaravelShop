<script setup>
import Header from "./views/components/Header.vue";
</script>

<template>
    <Header />
    <div class="container py-3">
        <main class="py-3">
            <RouterView />
        </main>
    </div>
</template>
