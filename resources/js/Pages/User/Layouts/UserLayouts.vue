<script setup>
import { Head } from "@inertiajs/vue3";
import { onMounted } from "vue";
import { initFlowbite } from "flowbite";
import Header from "@/Pages/User/Layouts/Header.vue";
import Footer from "@/Pages/User/Layouts/Footer.vue";

// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
});
</script>

<template>
    <Head title="Welcome" />

    <Header />

    <slot />

    <Footer />
</template>
