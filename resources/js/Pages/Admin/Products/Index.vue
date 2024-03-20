<template>
    <Head title="Product" />

    <AdminLayout>
        <ProductList :products="products" />
    </AdminLayout>
</template>

<script setup>
import { onMounted } from "vue";
import { initFlowbite } from "flowbite";
import AdminLayout from "@/Pages/Admin/Components/AdminLayout.vue";
import ProductList from "@/Pages/Admin/Products/ProductList.vue";
import { Head } from "@inertiajs/vue3";

onMounted(() => {
    initFlowbite();
});

defineProps({
    products: Array,
});
</script>
